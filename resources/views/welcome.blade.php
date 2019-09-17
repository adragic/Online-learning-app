
@extends('layouts.app')


@section('content')
<!-- About -->

<section class="row" id="tmAbout">

          <header class="col-12 tm-about-header">
            <h2 class="text-uppercase text-center text-dark tm-about-page-title">About this app</h2>
            <hr class="tm-about-title-hr">
          </header>
          
          <div class="col-lg-4">
            <div class="tm-bg-black-transparent tm-about-box">
              <div class="tm-about-number-container">1</div>              
              <h3 class="tm-about-name">Login and register</h3>
              <p class="tm-about-description">
              You must register or login before using the application.
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="tm-bg-black-transparent tm-about-box">
              <div class="tm-about-number-container">2</div>              
              <h3 class="tm-about-name">Post</h3>
              <p class="tm-about-description">
                If you want to share some useful content with colleagues from your college or are looking for one, select a section of the app called Post!
              </p>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="tm-bg-black-transparent tm-about-box">
              <div class="tm-about-number-container">3</div>              
              <h3 class="tm-about-name">Forum</h3>
              <p class="tm-about-description">
              If you have a question for colleagues from your college or want to help colleagues in their search for an answer, choose a part of the application called Forum!
              </p>
            </div>
          </div>
        </section>
        
@endsection


