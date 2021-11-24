<?php
    require_once('../../repository/UserRepository.php');
    require_once('../../models/search/SearchUser.php');
    $id = $_POST['id'];
    $userRepo = new UserRepository();
    $data = $userRepo->delete($id);
    echo "Xóa thành công!";
?>