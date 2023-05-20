<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductImageController;
use App\Http\Controllers\Admin\MpdfContactListController;
use App\Http\Controllers\Admin\CompanyInformationController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/',  [HomeController::class, 'index'])->name('home');
Route::get('/singlepost/{id}',  [HomeController::class, 'singlepost'])->name('singlepost');
Route::get('/about',  [HomeController::class, 'about'])->name('about');
Route::get('/commingsoon',  [HomeController::class, 'commingsoon'])->name('commingsoon');
Route::get('/contact',  [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-us',  [HomeController::class, 'contactus'])->name('contactus');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {


    Route::resource('post', PostController::class);
    Route::post('post/{id}/status', [PostController::class, 'status'])->name('post.status');
    route::get('post/trashed/list', [PostController::class, 'trashed'])->name('post.trashList');
    route::post('trashed/restore/{id}', [PostController::class, 'restore'])->name('trashed.restore');
    route::post('trashed/delete/{id}', [PostController::class, 'delete'])->name('trashed.delete');



    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('admin.home');

    // Route::resources([
    //    'color' => ColorController::class,
    //     'size' => SizeController::class,
    // ]);

    Route::get('/category',  [CategoryController::class, 'index'])->name('admin.category');
    Route::post('/category/store',  [CategoryController::class, 'store'])->name('category.store');
    Route::post('/category/update/{id}',  [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/edit/{id}',  [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('/category/view/{id}',  [CategoryController::class, 'view'])->name('category.view');
    Route::get('/category/destroy/{id}',  [CategoryController::class, 'destroy'])->name('category.destroy');


    Route::get('/subcategory',  [SubCategoryController::class, 'index'])->name('admin.subcategory');
    Route::post('/subcategory/store',  [SubCategoryController::class, 'store'])->name('subcategory.store');
    Route::post('/subcategory/update/{id}',  [SubCategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/edit/{id}',  [SubCategoryController::class, 'edit'])->name('subcategory.edit');
    Route::get('/subcategory/view/{id}',  [SubCategoryController::class, 'view'])->name('subcategory.view');
    Route::get('/subcategory/destroy/{id}',  [SubCategoryController::class, 'destroy'])->name('subcategory.destroy');


    Route::get('/brand',  [BrandController::class, 'index'])->name('admin.brand');
    Route::post('/brand/store',  [BrandController::class, 'store'])->name('brand.store');
    Route::post('/brand/update/{id}',  [BrandController::class, 'update'])->name('brand.update');
    Route::get('/brand/edit/{id}',  [BrandController::class, 'edit'])->name('brand.edit');
    Route::get('/brand/view/{id}',  [BrandController::class, 'view'])->name('brand.view');
    Route::get('/brand/destroy/{id}',  [BrandController::class, 'destroy'])->name('brand.destroy');


    Route::get('/product',  [ProductController::class, 'index'])->name('admin.product');
    Route::post('/product/store',  [ProductController::class, 'store'])->name('product.store');
    Route::post('/product/update/{id}',  [ProductController::class, 'update'])->name('product.update');
    Route::get('/product/edit/{id}',  [ProductController::class, 'edit'])->name('product.edit');
    Route::get('/product/view/{id}',  [ProductController::class, 'view'])->name('product.view');
    Route::get('/product/destroy/{id}',  [ProductController::class, 'destroy'])->name('product.destroy');


    Route::get('/product_image',  [ProductImageController::class, 'index'])->name('admin.product_image');
    Route::post('/product_image/store',  [ProductImageController::class, 'store'])->name('product_image.store');
    Route::post('/product_image/update/{id}',  [ProductImageController::class, 'update'])->name('product_image.update');
    Route::get('/product_image/edit/{id}',  [ProductImageController::class, 'edit'])->name('product_image.edit');
    Route::get('/product_image/view/{id}',  [ProductImageController::class, 'view'])->name('product_image.view');
    Route::get('/product_image/destroy/{id}',  [ProductImageController::class, 'destroy'])->name('product_image.destroy');


    Route::get('/company_information',  [CompanyInformationController::class, 'index'])->name('admin.companyinfo');
    Route::post('/company_information/store',  [CompanyInformationController::class, 'store'])->name('companyinfo.store');
    Route::post('/company_information/update',  [CompanyInformationController::class, 'update'])->name('companyinfo.update');
    Route::get('/company_information/edit/{id}',  [CompanyInformationController::class, 'edit'])->name('companyinfo.edit');
    Route::get('/company_information/destroy/{id}',  [CompanyInformationController::class, 'destroy'])->name('companyinfo.destroy');





    Route::get('/team_member',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'index'])->name('admin.team_member');
    Route::post('/team_member/store',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'store'])->name('team_member.store');
    Route::get('/team_member/show/{id}',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'view'])->name('team_member.show');
    Route::post('/team_member/update/{id}',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'update'])->name('team_member.update');
    Route::get('/team_member/edit/{id}',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'edit'])->name('team_member.edit');
    Route::get('/team_member/destroy/{id}',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'destroy'])->name('team_member.destroy');
    Route::get('/team_member/changestatus/{id}',  [\App\Http\Controllers\Admin\TeamMemberController::class, 'status'])->name('team_member.status');



    Route::get('/company_information',  [\App\Http\Controllers\Admin\CompanyInformationController::class, 'index'])->name('admin.companyinfo');
    Route::post('/company_information/store',  [\App\Http\Controllers\Admin\CompanyInformationController::class, 'store'])->name('companyinfo.store');
    Route::post('/company_information/update',  [\App\Http\Controllers\Admin\CompanyInformationController::class, 'update'])->name('companyinfo.update');
    Route::get('/company_information/edit/{id}',  [\App\Http\Controllers\Admin\CompanyInformationController::class, 'edit'])->name('companyinfo.edit');
    Route::get('/company_information/destroy/{id}',  [\App\Http\Controllers\Admin\CompanyInformationController::class, 'destroy'])->name('companyinfo.destroy');


    Route::get('/program',  [\App\Http\Controllers\nextProgramController::class, 'index'])->name('admin.index');
    Route::get('/program/create',  [\App\Http\Controllers\nextProgramController::class, 'create'])->name('admin.create');
    Route::post('/program/store',  [\App\Http\Controllers\nextProgramController::class, 'store'])->name('program.store');
    Route::get('/program/edit/{id}',  [\App\Http\Controllers\nextProgramController::class, 'edit'])->name('program.edit');
    Route::post('/program/update/{id}',  [\App\Http\Controllers\nextProgramController::class, 'update'])->name('program.update');
    Route::get('/program/destroy/{id}',  [\App\Http\Controllers\nextProgramController::class, 'destroy'])->name('program.destroy');


    Route::get('/header',  [\App\Http\Controllers\Admin\HeaderController::class, 'index'])->name('admin.header');
    Route::post('/header/store',  [\App\Http\Controllers\Admin\HeaderController::class, 'store'])->name('header.store');
    Route::get('/header/edit/{id}',  [\App\Http\Controllers\Admin\HeaderController::class, 'edit'])->name('header.edit');
    Route::post('/header/update/{id}',  [\App\Http\Controllers\Admin\HeaderController::class, 'update'])->name('header.update');
    Route::get('/header/destroy/{id}',  [\App\Http\Controllers\Admin\HeaderController::class, 'destroy'])->name('header.destroy');


    Route::get('/working_experience',  [\App\Http\Controllers\Admin\CounterController::class, 'index'])->name('admin.working_experience');
    Route::post('/working_experience/store',  [\App\Http\Controllers\Admin\CounterController::class, 'store'])->name('working_experience.store');
    Route::get('/working_experience/edit/{id}',  [\App\Http\Controllers\Admin\CounterController::class, 'edit'])->name('working_experience.edit');
    Route::post('/working_experience/update/{id}',  [\App\Http\Controllers\Admin\CounterController::class, 'update'])->name('working_experience.update');
    Route::get('/working_experience/destroy/{id}',  [\App\Http\Controllers\Admin\CounterController::class, 'destroy'])->name('working_experience.destroy');



    Route::post('/about-banner/store',  [\App\Http\Controllers\Admin\AboutBannerController::class, 'contactData'])->name('about-banner.store');
    Route::get('/about-banner/edit/{id}',  [\App\Http\Controllers\Admin\AboutBannerController::class, 'edit'])->name('about-banner.edit');
    Route::post('/about-banner/update/{id}',  [\App\Http\Controllers\Admin\AboutBannerController::class, 'update'])->name('about-banner.update');
    Route::get('/about-banner/destroy/{id}',  [\App\Http\Controllers\Admin\AboutBannerController::class, 'destroy'])->name('about-banner.destroy');





    Route::get('/visitors', [\App\Http\Controllers\Admin\DashboardController::class, 'visitors']);

    Route::get('/contactData', [\App\Http\Controllers\AdminController::class, 'contactData'])->name('contactlist');
    //genarate pdf
    Route::get('/contact-list',  [\App\Http\Controllers\Admin\MpdfContactListController::class, 'viewPdfContactList'])->name('pdfContactList');

});
