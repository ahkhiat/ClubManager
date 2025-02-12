<?php 
require_once __DIR__ . '/../../Utils/header.php';
?>

<section class="bg-gray-50">
  <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
      <a href="#" class="flex items-center mb-6 text-2xl font-semibold text-gray-900 ">
          <!-- <img class="w-8 h-8 mr-2" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/logo.svg" alt="logo"> -->
          CoachTracker Administration    
      </a>
      <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0 ">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl ">
                  Create an account
              </h1>
              <form class="space-y-4 md:space-y-6" action="?controller=auth&action=register_valid" method="POST">
                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">Your email</label>
                      <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                      <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 d " required="">
                  </div>
                  <div>
                      <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 ">Your firstname</label>
                      <input type="text" name="firstname" id="firstname" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 ">Your lastname</label>
                      <input type="text" name="lastname" id="lastname" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                  </div>
                  <div>
                      <label for="birthdate" class="block mb-2 text-sm font-medium text-gray-900 ">Your birthdate</label>
                      <input type="date" name="birthdate" id="birthdate" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 " placeholder="name@company.com" required="">
                  </div>
                  
                  
                  <button type="submit" name="submit_registration" class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ">Register</button>
                  <p class="text-sm font-light text-gray-500 ">
                      Already have an account? <a href="?controller=auth&action=form_login" class="font-medium text-primary-600 hover:underline ">Sign in</a>
                  </p>
              </form>
          </div>
      </div>
  </div>
</section>