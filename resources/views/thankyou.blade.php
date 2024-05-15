@extends('layout')

@section('title', 'Thank You')

@section('extra-css')

@endsection

@section('body-class', 'sticky-footer')

@section('content')

   <div class="thank-you-section">
       <h1>Thank you for <br> Your Order!</h1>
       <p>A confirmation email will be sent to you for the date of pick-up </p>
       <p>at EEI-EDC Commissary physical store located inside EEI Corporation.</p>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/') }}" class="button">Home Page</a>
       </div>
   </div>




@endsection
