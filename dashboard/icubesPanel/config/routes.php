<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'userAuth/userLogin';
$route['partner/login'] = 'userAuth/userLogin';
$route['partner/:any/auth'] = 'userAuth/sendAuthToUser';
$route['partner/:any/auth/verify'] = 'userAuth/verifyUsingAuth';
$route['partner/signUp'] = 'userAuth/userRegistration';
$route['users/list'] = 'userAuth/getUserLists';
$route['user/:any/logout'] = 'userAuth/userLogOut';
$route['partner/:any/edit/basicInfo'] = 'userAuth/editUserBasicInfo';
$route['partner/:any/edit/permissions'] = 'userAuth/updateUserPerms';
$route['partner/:any/password/reset'] = 'userAuth/passwordPostLoginRecovery';
$route['partner/password/reset'] = 'userAuth/passwordPreLoginRecovery';
$route['partner/password/prelogin/reset'] = 'userAuth/updatePreLoginPassword';
$route['company/:num/:any/edit'] = 'userAuth/updateCompanyInfo';
$route['company/:any/view'] = 'userAuth/getCompanyInfo';
$route['company/:any/add'] = 'userAuth/addCompanyInfo';
$route['billing/:any/add'] = 'userAuth/addUserBillingInfo';
$route['billing/:any/edit'] = 'userAuth/editUserBillingInfo';
$route['partner/:any/view'] = 'userAuth/getUserInfo';
// $route['campaign/create'] = 'campaigns/index';
$route['offer/create/basic'] = 'campaigns/createCampBasicInfo';
$route['offer/:num/create/adv'] = 'campaigns/createCampAdvInfo';
$route['offer/7/create/aff'] = 'campaigns/createCampAffInfo';
$route['campaign/:num/edit'] = 'campaigns/campaignEdit';
$route['campaign/:num/view'] = 'campaigns/campaignView';
$route['user/role/get'] = 'userAuth/getMaxRoles';
$route['package/search'] = 'common/searchPackageDetails';
$route['package/:num/view'] = 'common/viewPackageData';
$route['package/lists'] = 'common/getPackageLists';
$route['package/scraper'] = 'common/packageScraper';
$route['package/create'] = 'common/createPackgeName';
$route['roid/create'] = 'common/createRoId';
$route['roid/lists'] = 'common/getAllRoIdsData';
$route['roid/:num/view'] = 'common/getRoIdData';
$route['camp/header/create'] = 'common/createOfferHeaders';
$route['camp/header/list'] = 'common/getHeaderlists';
$route['camp/header/search'] = 'common/searchOfferHeaders';
$route['camp/header/:num/view'] = 'common/viewOfferHeaders';
$route['camp/header/:num/edit'] = 'common/editOfferHeaders';

//Need to complete
//Mapping lists
$route['camp/header/mapping/list'] = 'common/getHeaderMappingLists';
$route['camp/header/mapping/create'] = 'common/createOfferHeaderMapping';
$route['camp/header/mapping/view'] = 'common/viewOfferHeaderMapping';
$route['camp/header/search'] = 'common/searchOfferHeaderMappings';
$route['camp/header/mapping/:num/edit'] = 'common/editOfferHeaderMappings';
//


$route['roid/search'] = 'common/searchRoID';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;