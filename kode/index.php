<?php
require_once 'viewmodel/MenuCategoryViewModel.php';
require_once 'viewmodel/MenuItemViewModel.php';
require_once 'viewmodel/OrderViewModel.php';

// Ambil parameter dari URL
$entity = isset($_GET['entity']) ? $_GET['entity'] : 'order';
$action = isset($_GET['action']) ? $_GET['action'] : 'list';

// Router sederhana untuk menangani entity dan action
switch ($entity) {
    case 'menu_category':
        $viewModel = new MenuCategoryViewModel();
        
        switch ($action) {
            case 'list':
                // Data binding antara viewModel dan view
                $categoryList = $viewModel->getCategoryList();
                require_once 'views/menu_category_list.php';
                break;
                
            case 'add':
                require_once 'views/menu_category_form.php';
                break;
                
            case 'edit':
                // Data binding untuk edit form
                $category = $viewModel->getCategoryById($_GET['id']);
                require_once 'views/menu_category_form.php';
                break;
                
            case 'save':
                $viewModel->addCategory($_POST['name'], $_POST['description']);
                header('Location: index.php?entity=menu_category');
                break;
                
            case 'update':
                $viewModel->updateCategory($_GET['id'], $_POST['name'], $_POST['description']);
                header('Location: index.php?entity=menu_category');
                break;
                
            case 'delete':
                $viewModel->deleteCategory($_GET['id']);
                header('Location: index.php?entity=menu_category');
                break;
        }
        break;
        
    case 'menu_item':
        $viewModel = new MenuItemViewModel();
        
        switch ($action) {
            case 'list':
                // Data binding antara viewModel dan view
                $menuItemList = $viewModel->getMenuItemList();
                require_once 'views/menu_item_list.php';
                break;
                
            case 'add':
                // Data binding untuk kategori di form
                $categories = $viewModel->getCategories();
                require_once 'views/menu_item_form.php';
                break;
                
            case 'edit':
                // Data binding untuk edit form
                $menuItem = $viewModel->getMenuItemById($_GET['id']);
                $categories = $viewModel->getCategories();
                require_once 'views/menu_item_form.php';
                break;
                
            case 'save':
                $viewModel->addMenuItem(
                    $_POST['name'], 
                    $_POST['description'], 
                    $_POST['price'], 
                    $_POST['category_id'], 
                    $_POST['is_available']
                );
                header('Location: index.php?entity=menu_item');
                break;
                
            case 'update':
                $viewModel->updateMenuItem(
                    $_GET['id'], 
                    $_POST['name'], 
                    $_POST['description'], 
                    $_POST['price'], 
                    $_POST['category_id'], 
                    $_POST['is_available']
                );
                header('Location: index.php?entity=menu_item');
                break;
                
            case 'delete':
                $viewModel->deleteMenuItem($_GET['id']);
                header('Location: index.php?entity=menu_item');
                break;
        }
        break;
        
    case 'order':
    default:
        $viewModel = new OrderViewModel();
        
        switch ($action) {
            case 'list':
                // Data binding antara viewModel dan view
                $orderList = $viewModel->getOrderList();
                require_once 'views/order_list.php';
                break;
                
            case 'add':
                // Data binding untuk menu items di form
                $menuItems = $viewModel->getMenuItems();
                require_once 'views/order_form.php';
                break;
                
            case 'edit':
                // Data binding untuk edit form
                $order = $viewModel->getOrderById($_GET['id']);
                $menuItems = $viewModel->getMenuItems();
                require_once 'views/order_form.php';
                break;
                
            case 'save':
                $viewModel->addOrder(
                    $_POST['customer_name'], 
                    $_POST['table_number'], 
                    $_POST['menu_item_id'], 
                    $_POST['quantity'], 
                    $_POST['status']
                );
                header('Location: index.php?entity=order');
                break;
                
            case 'update':
                $viewModel->updateOrder(
                    $_GET['id'], 
                    $_POST['customer_name'], 
                    $_POST['table_number'], 
                    $_POST['menu_item_id'], 
                    $_POST['quantity'], 
                    $_POST['status']
                );
                header('Location: index.php?entity=order');
                break;
                
            case 'delete':
                $viewModel->deleteOrder($_GET['id']);
                header('Location: index.php?entity=order');
                break;
        }
        break;
}
?>