@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>Thank you for your interest in eKart!</h1><br>
       <div class="spacer"></div>
       <p><strong>We regret to inform that you were identified as NON-MEMBER of the EEI EDC.</strong></p><br>
       <div class="spacer"></div>
       <p>Should you want to know more and be part of the Cooperative, feel free to contact us at <br>
          +632-8-334-2677 or email at eei-edc@eei.com.ph.</p><br>
       <div class="spacer"></div>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Home Page</a>
       </div>
   </div>




@endsection
