<?php
require_once 'models/UserModel.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function index() {
        $this->dashboard();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $correo = sanitize($_POST['correo']);
            $password = $_POST['password'];

            $user = $this->userModel->login($correo, $password);
            
            if ($user) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['correo'] = $user['correo'];
                $_SESSION['role'] = $user['role'];
            
                setMessage('Bienvenido, ' . $user['username']);
            
                // Si hay un servicio seleccionado previamente, redirigir a cotización
                if (isset($_SESSION['intended_service'])) {
                    $service_id = $_SESSION['intended_service'];
                    unset($_SESSION['intended_service']);
                    redirect('index.php?page=quote&action=request&service_id=' . $service_id);
                } else {
                    redirect('index.php?page=user&action=dashboard');
                }
            } else {
                setMessage('Credenciales incorrectas', 'danger');
            }
        }
    
        require_once 'views/user/login.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = sanitize($_POST['username']);
            $correo = sanitize($_POST['correo']);
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                setMessage('Las contraseñas no coinciden', 'danger');
            } else {
                $result = $this->userModel->register($username, $correo, $password);
                if ($result) {
                    setMessage('Usuario registrado exitosamente. Ahora puedes iniciar sesión.');
                
                    // Si hay un servicio seleccionado, mantenerlo para después del login
                    if (isset($_SESSION['intended_service'])) {
                        redirect('index.php?page=user&action=login');
                    } else {
                        redirect('index.php?page=user&action=login');
                    }
                } else {
                    setMessage('Error al registrar usuario. El correo ya existe.', 'danger');
                }
            }
        }
    
        require_once 'views/user/register.php';
    }

    public function dashboard() {
        requireLogin();
        require_once 'views/user/dashboard.php';
    }

    public function changeUsername() {
        requireLogin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $newUsername = sanitize($_POST['username']);
            
            if ($this->userModel->updateUsername($_SESSION['user_id'], $newUsername)) {
                $_SESSION['username'] = $newUsername;
                setMessage('Nombre de usuario actualizado exitosamente');
                redirect('index.php?page=user&action=dashboard');
            } else {
                setMessage('Error al actualizar el nombre de usuario', 'danger');
            }
        }
        
        require_once 'views/user/change_username.php';
    }

    public function changePassword() {
        requireLogin();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($newPassword !== $confirmPassword) {
                setMessage('Las contraseñas nuevas no coinciden', 'danger');
            } else {
                $result = $this->userModel->changePassword($_SESSION['user_id'], $currentPassword, $newPassword);
                if ($result) {
                    setMessage('Contraseña actualizada exitosamente');
                    redirect('index.php?page=user&action=dashboard');
                } else {
                    setMessage('Contraseña actual incorrecta', 'danger');
                }
            }
        }
        
        require_once 'views/user/change_password.php';
    }

    public function list() {
        requireAdmin();
        $users = $this->userModel->getAllUsers();
        require_once 'views/user/list.php';
    }
}
?>
