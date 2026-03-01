<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CourseEnrollController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobController;
use App\Http\Controllers\Frontend\PageController;
use App\Http\Controllers\Frontend\ShopController;
use App\Http\Controllers\Payment\StripeController;
use Illuminate\Support\Facades\Route;

//Homepage
Route::get('/', [HomeController::class, 'index'])->name('homepage');

//Learn More
Route::get('/learn/more', [HomeController::class, 'LearnMore'])->name('learn.more');

//What We Do
Route::get('/Whatwe/do', [HomeController::class, 'whatWeDo'])->name('whatwedo');
Route::get('/donate', [HomeController::class, 'donate'])->name('donate');

Route::get('/research/reports', [HomeController::class, 'researchReport'])->name('researchReport');

//Software All route
Route::get('/software/common', [HomeController::class, 'softwareCommon'])->name('software.common');

//Software Info
Route::get('/software/info', [HomeController::class, 'softwareInfo'])->name('software.info');

//Hardware All route
Route::get('/hardware/common', [HomeController::class, 'hardwareCommon'])->name('hardware.common');

//hardware Info
Route::get('/hardware/info', [HomeController::class, 'hardwareInfo'])->name('hardware.info');

//Training
Route::get('/training', [HomeController::class, 'training'])->name('training');
Route::get('/all-courses', [HomeController::class, 'allCourses'])->name('courses.all');
Route::get('/course/{id}/{slug}', [HomeController::class, 'courseDetails']);

Route::get('/member-registration', [HomeController::class, 'courseRegistration'])->name('course.registration');
Route::post('/member-registration/store', [HomeController::class, 'courseRegistrationStore'])->name('course.registration.store');

//Books
Route::get('/books', [HomeController::class, 'books'])->name('books');
Route::get('/books', [HomeController::class, 'books'])->name('books');

//Industry

//Contact & Support
Route::post('/contact_us', [ContactController::class, 'store'])->name('contactus.store');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/contact/location', [HomeController::class, 'location'])->name('location');
Route::get('support', [HomeController::class, 'Support'])->name('support');
Route::get('/newsletter', [NewsletterController::class, 'newsletter']);
Route::post('/newsletter/store', [NewsLetterController::class, 'store'])->name('newsletter.store');

//Feature details
Route::get('/feature/{id}/details/', [HomeController::class, 'FeatureDetails'])->name('feature.details');

//product

// Route::get('/product/filter', [HomeController::class, 'filter'])->name('filter');

// Shop // Filter

//storys
Route::get('/storys/all', [HomeController::class, 'AllStory'])->name('all.story');
Route::get('/story/{id}/details', [HomeController::class, 'StoryDetails'])->name('story.details');

//Blogs
Route::get('/blogs/all', [HomeController::class, 'AllBlog'])->name('all.blog');
Route::get('/blog/{id}/details', [HomeController::class, 'BlogDetails'])->name('blog.details');

//Techglossy
Route::get('/techglossy/all', [HomeController::class, 'AllTechGlossy'])->name('all.techglossy');
Route::get('/techglossy/{id}/details', [HomeController::class, 'TechGlossyDetails'])->name('techglossy.details');



Route::get('/about-us', [HomeController::class, 'about'])->name('about');

//Terms & Policy
Route::get('faq', [HomeController::class, 'faq'])->name('faq');
Route::get('privacy-policy', [HomeController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('terms-condition', [HomeController::class, 'termsCondition'])->name('terms.policy');
// Route::get('terms_policy/{id}/details', [HomeController::class, 'TermsPolicyDetails'])->name('terms.details');

//Portfolio
Route::get('portfolio', [HomeController::class, 'Portfolio'])->name('portfolio');
// Route::get('portfolio/{id}/details', [HomeController::class, 'portfolioDetails'])->name('portfolio.details');
Route::get('portfolio/{id}/details/', [HomeController::class, 'portfolioDetails'])->name('portfolio.details');



// Stripe Payment
Route::controller(StripeController::class)->group(function () {
    Route::post('/stripe/order', 'StripeOrder')->name('stripe.order');
    Route::post('/cash/order', 'CashOrder')->name('cash.order');
});

Route::controller(JobController::class)->group(function () {
    Route::get('/jobs', 'JobOpenings')->name('job.openings');
    Route::get('/job/apply', 'jobApply')->name('job.apply');
    Route::get('/job-details/{id}', 'JobDetails')->name('job.details');
    Route::get('/job-registration', 'JobRegistration')->name('job.registration');
    Route::post('/job-registration/store', 'JobRegistrationStore')->name('job_registration.store');
    // Route::get('/job-register-user', 'jobRegisterUser')->name('job.regiserUser');
});



