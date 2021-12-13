<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['en'] = 'Home';
$route['en/login'] = 'Login';
$route['en/verifyEmail'] = 'Login/verifyEmail';
$route['en/register'] = 'Login/register';

$route['en/productList'] = 'Products';
$route['en/productAdd'] = 'Products/AddProduct';
$route['en/productView/(:any)'] = 'Products/EditProduct';

$route['en/profile'] = 'Profile';
$route['en/ManageAccount'] = 'Profile/ManageAccount';
$route['en/DocSetting'] = 'Profile/DocSetting';
$route['en/chatSetting'] = 'Profile/ChatSetting';

// Shipping Menu //
$route['en/Shippings/delivery_in_batch'] = 'Shippings';

//Orders start//
$route['en/ManageOrders/allorders-tab'] = 'Orders';
$route['en/ManageOrders/ManageOrders_unpaid'] = 'Orders/unpaid_tab';
$route['en/ManageOrders/ManageOrders_toship'] = 'Orders/toship_tab';
$route['en/ManageOrders/ManageOrders_shipping'] = 'Orders/shipping_tab';
$route['en/ManageOrders/ManageOrders_success'] = 'Orders/success_tab';
$route['en/ManageOrders/ManageOrders_cancelled'] = 'Orders/cancelled_tab';
$route['en/ManageOrders/ManageOrders_return'] = 'Orders/return_tab';


$route['th/ManageOrders/allorders-tab'] = 'Orders';
$route['th/ManageOrders/ManageOrders_unpaid'] = 'Orders/unpaid_tab';
$route['th/ManageOrders/ManageOrders_toship'] = 'Orders/toship_tab';
$route['th/ManageOrders/ManageOrders_shipping'] = 'Orders/shipping_tab';
$route['th/ManageOrders/ManageOrders_success'] = 'Orders/success_tab';
$route['th/ManageOrders/ManageOrders_cancelled'] = 'Orders/cancelled_tab';
$route['th/ManageOrders/ManageOrders_return'] = 'Orders/return_tab';

// $route['th/ManageOrders/(:any)'] = 'Orders';

//To Ship
$route['en/ManageOrders/toShipOrders-tab'] = 'Orders/toship_tab';
$route['en/ManageOrders/toShipNotprocess-tab'] = 'Orders/toship_tab';
$route['en/ManageOrders/toShipProcessed-tab'] = 'Orders/toship_tab';


//Return
$route['en/ManageOrders/returnAllorders2-tab'] = 'Orders/return_tab';
$route['en/ManageOrders/returnNotprocess2-tab'] = 'Orders/return_tab';
$route['en/ManageOrders/returnProcessed2-tab'] = 'Orders/return_tab';

//Order Detail
$route['en/OrderDetial/(:any)'] = 'Orders/orderDetail';
$route['en/OrderDetial/Print_Parcel/(:any)'] = 'Orders/printParcel';

$route['en/Quotation'] = 'Orders/quotation';
$route['en/QuotationDetail/(:any)'] = 'Orders/quotationDetail';
$route['en/QuotationList/(:any)'] = 'Orders/quotationList';

$route['en/setting'] = 'Setting';

$route['en/ads'] = 'Ads';

$route['en/test/(:any)'] = 'Test';

//admin
$route['en/admin'] = 'Admin';
$route['en/manageSeller'] = 'Admin/manageSeller';
$route['en/adminSetting'] = 'Admin/adminSetting';
$route['en/manageAdmin'] = 'Admin/manageAdmin';
$route['en/adminRegister'] = 'Admin/adminRegis';
$route['en/adminQuotation'] = 'Admin/quotation';
$route['en/adminQuotationDetail/(:any)'] = 'Admin/quotationDetail';
$route['en/adminOrders'] = 'Admin/orders';

//condition
$route['en/condition_and_term'] = 'Condition';

//Chat
$route['en/chat'] = 'Chat';

//Finance
$route['en/income'] = 'Finance';
$route['en/balance'] = 'Finance/balance';
$route['en/report/(:any)'] = 'Finance/report';

////////////////////////////////////////////////////////////////////////////////////////////

$route['th'] = 'Home';
$route['th/login'] = 'Login';
$route['th/verifyEmail'] = 'Login/verifyEmail';
$route['th/register'] = 'Login/register';

$route['th/productList'] = 'Products';
$route['th/productAdd'] = 'Products/AddProduct';
$route['th/productView/(:any)'] = 'Products/EditProduct';

$route['th/profile'] = 'Profile';
$route['th/ManageAccount'] = 'Profile/ManageAccount';
$route['th/DocSetting'] = 'Profile/DocSetting';
$route['th/chatSetting'] = 'Profile/ChatSetting';

// Shipping Menu //
$route['th/Shippings/delivery_in_batch'] = 'Shippings';

//Orders start//
$route['th/ManageOrders/allorders-tab'] = 'Orders';
$route['th/ManageOrders/ManageOrders_unpaid'] = 'Orders/unpaid_tab';
$route['th/ManageOrders/ManageOrders_toship'] = 'Orders/toship_tab';
$route['th/ManageOrders/ManageOrders_shipping'] = 'Orders/shipping_tab';
$route['th/ManageOrders/ManageOrders_success'] = 'Orders/success_tab';
$route['th/ManageOrders/ManageOrders_cancelled'] = 'Orders/cancelled_tab';
$route['th/ManageOrders/ManageOrders_return'] = 'Orders/return_tab';



//To Ship
$route['th/ManageOrders/toShipOrders-tab'] = 'Orders/toship_tab';
$route['th/ManageOrders/toShipNotprocess-tab'] = 'Orders/toship_tab';
$route['th/ManageOrders/toShipProcessed-tab'] = 'Orders/toship_tab';
// $route['th/ManageOrders/(:any)'] = 'Orders';

//Return
$route['th/ManageOrders/returnAllorders2-tab'] = 'Orders/return_tab';
$route['th/ManageOrders/returnNotprocess2-tab'] = 'Orders/return_tab';
$route['th/ManageOrders/returnProcessed2-tab'] = 'Orders/return_tab';


// $route['th/ManageOrders/(:any)'] = 'Orders';

$route['th/OrderDetial/(:any)'] = 'Orders/orderDetail';
$route['th/OrderDetial/Print_Parcel/(:any)'] = 'Orders/printParcel';

$route['th/Quotation'] = 'Orders/quotation';
$route['th/QuotationDetail/(:any)'] = 'Orders/quotationDetail';
$route['th/QuotationList/(:any)'] = 'Orders/quotationList';

$route['th/setting'] = 'Setting';

$route['th/ads'] = 'Ads';

$route['th/test/(:any)'] = 'Test';

//admin
$route['th/admin'] = 'Admin';
$route['th/manageSeller'] = 'Admin/manageSeller';
$route['th/adminSetting'] = 'Admin/adminSetting';
$route['th/adminQuotation'] = 'Admin/quotation';
$route['th/adminQuotationDetail/(:any)'] = 'Admin/quotationDetail';
$route['th/adminOrders'] = 'Admin/orders';

//condition
$route['th/condition_and_term'] = 'Condition';
$route['th/manageAdmin'] = 'Admin/manageAdmin';
$route['th/adminRegister'] = 'Admin/adminRegis';

//Chat
$route['th/chat'] = 'Chat';

//Finance
$route['th/income'] = 'Finance';
$route['th/balance'] = 'Finance/balance';
$route['th/report/(:any)'] = 'Finance/report';
$route['th/wallet'] = 'Finance/wallet';