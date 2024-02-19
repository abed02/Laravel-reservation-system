<?php

use App\Http\Controllers\Fronend\BookingDetails;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\Backend\RoomLitsController;
use App\Http\Controllers\Backend\RoomTypeController;
use App\Http\Controllers\Backend\RoomController;
use App\Http\Controllers\Fronend\FrondendRoomController;
use App\Http\Controllers\Fronend\BookingController;
use App\Http\Controllers\Fronend\BookingDetailsController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\TestmonialController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\commentController;
use App\Http\Controllers\Backend\ReportController; 
use App\Http\Controllers\Backend\GalleryController;








// Route::get('/', function () {
//     return view('main');BookingDetailsController
// });

Route::get('/', [UserController::class, 'Index']);








Route::get('/dashboard', function () {
    return view('frontend.dashboard.user_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// user must have kog in for access this route 

Route::middleware('auth')->group(function () {

    Route::get('/profile', [UserController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/store', [UserController::class, 'UserStore'])->name('profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::get('/user/change/password', [UserController::class,'UserChangePassword'])->name('user.Change.password');
    Route::post('/password/change/store', [UserController::class,'ChangePasswordStore'])->name('password.change.store');
    
    
});

require __DIR__.'/auth.php';
//chec if Authentication and role is admin 
Route::middleware(['auth','roles:admin'])->group(function() {
Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');
 // change admin data 
Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class,'AdminChangePassword'])->name('admin.change.password');
//change admin password
Route::post('/admin/password/update', [AdminController::class,'AdminPasswordUpdate'])->name('admin.password.update');

});


//admin group MIddleware   book.area.update
Route::middleware(['auth','roles:admin'])->group(function() {
    //Team all Rout 
    Route::controller(TeamController::class )->group(function(){
        Route::get('/All/team','AllTeam')->name('all.team');
        Route::get('/add/member','AddMember')->name('add.member');
        Route::post('/team/store','StoreTeam')->name('team.store');
        Route::get('/edit/team/{id}','EditTeam')->name('edit.team');
        Route::post('/team/update/','UpdateTeam')->name('team.update');
        Route::get('/delete/team/{id}','DeleteTeam')->name('delete.team');

        // Book ARea 
        Route::get('/book/area','BookArea')->name('book.area');
        Route::post('/book/area/update','BookAreaUpdate')->name('book.area.update');
    });

    //Room Type Route 
    Route::controller(RoomTypeController::class)->group(function(){
        Route::get('/room/type','RoomTypeList')->name('room.type.list');
        Route::get('add/room/type','AddRoomType')->name('add.room.type');
        Route::post('/room/type/store','RoomTypeStore')->name('room.type.store');
        Route::post('/room/type/store','RoomTypeStore')->name('room.type.storeee');

    });


      //Room  Route 
      Route::controller(RoomController::class)->group(function(){
        Route::get('/edit/room/{id}','EditRoom')->name('edit.room');
        Route::post('/update/room/{id}','UpdateRoom')->name('update.room');
        Route::get('/multi/image/delete/{id}','MultiImageDelete')->name('multi.image.delete');
        Route::post('/store/room/number/{id}','StoreRoomNumber')->name('store.room.no');
        Route::get('/edit/roomno/{id}','EditRoomNumber')->name('edit.roomno');
        Route::post('/update/roomno/{id}','UpdateRoomNumber')->name('update.roomno');
        Route::get('/Delete/roomno/{id}','DeleteRoomNumber')->name('delete.roomno');

        Route::get('/Delete/room/{id}','DeleteRoom')->name('delete.room'); 
    });

    // Admin Booking all Routes dowmload.invoice

    Route::controller(BookingController::class)->group(function(){
        Route::get('/booking/list','BookingList')->name('booking.list');
        Route::get('/edit/booking/{id}','EditBooking')->name('edit.booking');

        Route::get('/download/invoice/{id}','DownloadInovice')->name('download.invoice');
        

       

    });


    
    Route::controller(BookingController::class)->group(function(){
        Route::get('/booking/list','BookingList')->name('booking.list');
        Route::get('/edit/booking/{id}','EditBooking')->name('edit.booking');

    });

    // ADMIN room list all route  store.roomlist
    Route::controller(RoomLitsController::class)->group(function(){
        Route::get('/view/room/list','ViewRoomList')->name('view.room.list');
        Route::get('/add/room/list','AddRoomList')->name('add.room.list');
        Route::post('/store/roomlist','StoreRoomList')->name('store.roomlist');


    });


        // ADMIN room list all route  store.roomlist 
        Route::controller(SettingController::class)->group(function(){
            Route::get('/smtp/setting','SmtpSetting')->name('smtp.setting');
            Route::post('/smtp/setting/update','SmtpUpdate')->name('smtp.update');

            //site sitteng
            Route::get('/site/setting','SiteSetting')->name('site.setting');
            Route::post('/site/update', 'SiteUpdate')->name('site.update');

       
    
        });


         // Testimonial room list all route  add.testimonial testimonial  testimonial  delete.testimonial
         Route::controller(TestmonialController::class)->group(function(){
            Route::get('/all/testimonial','AllTestimonial')->name('all.testimonial');
            Route::get('/add/testimonial','AddTestimonial')->name('add.testimonial');
            Route::post('/Store/testimonial','StoreTestimonial')->name('testimonial.store');
            Route::get('/Edit/testimonial/{id}','EditTestimonial')->name('edit.testimonial');
            Route::post('/Update/testimonial','UpdateTestimonial')->name('testimonial.update');
            Route::get('/delete/testimonial/{id}','DeleteTestimonial')->name('delete.testimonial');


    
        });

        // Blogsss  store.blog.category  all.blog.post
        Route::controller(BlogController::class)->group(function(){
            Route::get('/Blog/Category','Blogcatagory')->name('blog.category');
            Route::post('/stor/blog/Category','StoreBlogcatagory')->name('store.blog.category');
            Route::get('/edit/blog/category/{id}', 'EditBlogCategory');
            Route::post('/update/blog/category', 'UpdateBlogCategory')->name('update.blog.category');
            Route::get('/delete/blog/category/{id}', 'DeleteBlogCategory')->name('delete.blog.category');
        
           
        });

         // Blog posts   store.blog.category  all.blog.post   store.blog.post
         Route::controller(BlogController::class)->group(function(){
            Route::get('/all/blog','AllBlogPost')->name('all.blog.post');
            Route::get('/add/blog/post','AddBlogPost')->name('add.blog.post');
            Route::post('/store/blog/post','StoreBlogPost')->name('store.blog.post');
            Route::get('/edit/blog/post/{id}', 'EditBlogPost')->name('edit.blog.post');
            Route::post('/update/blog/post', 'UpdateBlogPost')->name('update.blog.post');
            Route::get('/delete/blog/post/{id}', 'DeleteBlogPost')->name('delete.blog.post');


            ///Front End  blog 
           
           
        
           
        });


 /// Comment update the comment in admin dashboard   update.comment.status
        Route::controller(CommentController::class)->group(function(){

            Route::get('/all/comment/', 'AllComment')->name('all.comment');
            Route::post('/update/comment/status', 'UpdateCommentStatus')->name('update.comment.status');
            
        
        
        });
        
    
    
        
 ///  Booking Report All route controller
 Route::controller(ReportController::class)->group(function(){

    Route::get('/booking/report/', 'BookingReport')->name('booking.report');
    Route::post('/search-by-date', 'SearchBydate')->name('search.by.date');


});


 /////// Gallery route 
Route::controller(GalleryController::class)->group(function() {

    Route::get('/all/gallery/', 'AllGallery')->name('all.gallery');
    Route::get('/add/gallery/', 'AddImage')->name('add.image');
    Route::post('/store/gallery/', 'StoreGallery')->name('store.image');
    Route::get('/Edit/gallery/{id}', 'EditGallery')->name('edit.gallery');
    Route::post('/update/gallery', 'UpdateGallery')->name('update.gallery');
    Route::get('/delete/gallery/{id}', 'DeleteGallery')->name('delete.gallery');
    Route::post('/delete/gallery/multiple', 'DeleteGalleryMultiple')->name('delete.gallery.multiple');

    // contact message admin view
    Route::get('/contact/message', 'AdminContactMessage')->name('contact.message');
    });



         /// Admin USer   All route controller
 Route::controller(AdminController::class)->group(function(){

    Route::get('/all/admin/', 'AllAdmin')->name('all.admin');
    Route::get('/add/admin/', 'AddAdmin')->name('add.admin');
    Route::post('/Store/admin/', 'StoreAdmin')->name('store.admin');
    Route::get('/edit/admin/{id}', 'EditAdmin')->name('edit.admin');
    Route::post('/update/admin/{id}', 'UpdateAdmin')->name('update.admin');
    Route::get('/delete/admin/{id}', 'DeleteAdmin')->name('delete.admin');




});

    
        






}); // End admin group Middleware




Route::get('/admin/login', [AdminController::class, 'adminLogin'])->name('admin.login');

Route::controller(FrondendRoomController::class)->group(function(){

    Route::get('/rooms','AllFrontendRoomList')->name('froom.all');

    // use url 
    Route::get('room/details/{id}','RoomDetailsPage');

    Route::get('/booking','BookingSearch')->name('booking.search');
    Route::get('/search/room/details/{id}','SearchRoomDetails')->name('search.room.details');

    Route::get('/check/room/availability/', 'CheckRoomAvailability')->name('check_room_availability');




});
//Book // user Must login to access the route
Route::middleware('auth')->group(function(){
    //checkout
    Route::controller(BookingController::class)->group(function(){
        Route::get('/checkout/','Checkout')->name('checkout');
        Route::post('/booking/store/','BookingStore')->name('user_booking_store');
        Route::post('/checkout/store/','CheckoutStore')->name('checkout.store');
        Route::match(['get','post'],'/stripe_pay','StripPay')->name('Stripe.pay');

         //booking update update.booking.status  update.booking assign_room_store assign_room_delete 

         Route::post('/update/booking/status/{id}','UpdateBookingStatus')->name('update.booking.status');
         Route::post('/update/booking/{id}','UpdateBooking')->name('update.booking');
            //ASsign room rout

            Route::get('/Assign/room/{id}','AssignRoom')->name('assign_room');
            Route::get('/Assign/room/store/{booking_id}/{room_number_id}/{room_no}/','AssignRoomStore')->name('assign_room_store');
            Route::get('/Assign/room/delete/{booking_id}','AssignRoomDelete')->name('assign_room_delete');


         

    });

       // user booking Deltaies route 

       Route::controller(BookingDetailsController::class)->group(function (){
        
        Route::get('/user/booking','UserBooking')->name('user.booking');
        Route::get('/user/invoice/{id}', 'UserInvoice')->name('user.invoice');


       });



});


// Front end Blog route
Route::controller(BlogController::class)->group(function(){


    Route::get('/blog/details/{slug}','BlogDetails');
    Route::get('/blog/cat/list/{slug}','BlogcatList');
    Route::get('/blog', 'BlogList')->name('blog.list');

});


 // Route for comment add comment by user
Route::controller(CommentController::class)->group(function(){

    Route::post('/store/comment/', 'StoreComment')->name('store.comment');


});
 // Gallary  About us contact us 
Route::controller(GalleryController::class)->group(function(){
    Route::get('/gallery', 'ShowGallery')->name('show.gallery');


        // Contact All Route 
        Route::get('/contact', 'ContactUs')->name('contact.us');
        Route::post('/store/contact', 'StoreContactUs')->name('store.contact');
        Route::get('/about us', 'AboutUs')->name('about.us');




});

// '/mark-notification-as-read
//For notification 
Route::controller(BookingController::class)->group(function(){

    Route::post('/mark-notification-as-read/{notification}', 'MarkAsRead');


});





