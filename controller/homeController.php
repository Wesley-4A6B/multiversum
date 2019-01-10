<?php

require_once('model/homeModel.php');
require_once('model/afmeldenModel.php');
require_once('controller/adminController.php');

require_once('controller/contactController.php');
require_once('controller/catalogusController.php');
require_once('controller/detailsController.php');
require_once('controller/searchController.php');
require_once('controller/loginController.php');
require_once('controller/cartController.php');


class homeController {

    public function __construct()
    {
        /**
		 * Make an new instance of the classes
		 */

        $this->homeModel = new homeModel();
        $this->contactController = new contactController();
        $this->catalogusController = new catalogusController();
        $this->detailsController = new detailsController();
        $this->searchController = new searchController();
        $this->loginController = new loginController();
        $this->afmeldenModel = new afmeldenModel();
        $this->cartController = new cartController();
        $this->adminModel = new adminModel();
        $this->adminController = new adminController();

        //Calls the router method
        $this->router();
    }

    public function router()
    {
        /**
		 * Simplel router method
		 */

        //Get the URI
        $uri = explode('/', explode("?", trim($_SERVER['REQUEST_URI'], "/"))[0], 2);

        //switches the uri with all the possible pages
        switch($uri[0])
        {
            case 'home':
                $this->home();
                break;

            case 'cat':
                $this->cat();
                break;

            case 'details':
                $this->details();
                break;

            case 'contact':
                $this->contact();
                break;

            case 'search':
                $this->search();
                break;

            case 'login':
                $this->login();
                break;

            case 'afmelden':
                $this->afmelden();
                break;    

            case 'cart':
                $this->cart();
                break;    

            case 'admin':
                $this->adminPrivileges();
                break;

            case 'create':
                $this->create();
                break;

            case 'update':
                $this->update();
                break;

            case 'delete':
                $this->delete();
                break;
                
            default:
                $this->home();
        }
    }

    private function render($view, $app)
    {
        /**
		 * Tried to make some kind of a templating method
		 */

        $content = file_get_contents($view);
        $render = str_replace('xxxTxxx', $app, $content);

        require_once('assets/custom/template/header.php');
        echo $render;
        require_once('assets/custom/template/footer.php');
    }

    public function home() 
    {
        /**
		 * Grab stuff needed for the home page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->homeModel->showSales();
        $this->render('view/home.php', $app);
    }

    public function cat() 
    {
        /**
		 * Grab stuff needed for the catalogus page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->catalogusController->showCatalogus();
        $this->render('view/catalogus.php', $app);
    }

    public function details()
    {
        /**
		 * Grab stuff needed for the details page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->detailsController->showDetails();
        $this->render('view/details.php', $app);
    }

    public function contact() 
    {
        /**
		 * Grab stuff needed for the contact page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->contactController->makeContactForm();
        $this->render('view/contact.php', $app);
    }

    public function search()
    {
        /**
		 * Grab stuff needed for the search page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->searchController->showSearch();
        $this->render('view/search.php', $app);
    }

    public function login()
    {
        /**
		 * Grab stuff needed for the login page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->loginController->validateLogin();
        $this->render('view/admin/login.php', $app);
    }

    public function afmelden()
    {
        /**
		 * Grab stuff needed for the signout page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->afmeldenModel->afmelden(); 
        $this->render('view/admin/login.php', $app);
    }

    public function cart()
    {
        /**
		 * Grab stuff needed for the cart page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->cartController->makeCart();
        $this->render('view/cart.php', $app);
    }

    public function adminPrivileges()
    {
        /**
		 * Grab stuff needed for the admin page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->adminModel->displayAdmin();
        $this->render('view/admin/admin.php', $app);
    }

    public function create()
    {
        /**
		 * Grab stuff needed for the create page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->adminController->collectCreateProduct();
        $this->render('view/admin/create.php', $app);
    }

    public function update()
    {
        /**
		 * Grab stuff needed for the update page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->adminController->collectUpdateProduct();
        $this->render('view/admin/update.php', $app);
    }


    public function delete()
    {
        /**
		 * Grab stuff needed for the delete page
         * Stores it in app variable
         * Push it into our render method
         * Set the view
         * 
         * @return app
		 */

        $app = $this->adminController->collectDeleteProduct();
        $this->render('view/admin/delete.php', $app);
    }

}