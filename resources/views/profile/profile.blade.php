@extends('layouts.nav')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your_Profile</title>
    <link rel="stylesheet" href="{{url('profile')}}/style.css">
    <link rel="stylesheet" href="{{url('profile')}}/themify-icons/themify-icons.css">
</head>
<body>
    <div class="main">
        @foreach ($data as $user) 
        <div class="main-profile">
            <div class="profile">
                <div class="avatar-img">
                    <img class="avatar" src="{{url('profile')}}/img/user.png">
                </div>
                <div class="my-infor">
                    <p>{{$user->user_name}}</p>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('status') }}
                    </div>
                    @elseif(session('failed'))
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('failed') }}
                    </div>
                    @endif
                </div>
                <div class="my-infor">
                    <div class="check">
                        <button id="edit-profile" value="edit-profile">
                            Edit profile
                        </button>
                        
                    </div>
                    <div class="check">
                        <button id="edit-profile" value="payment">
                            Payment
                        </button>
                        
                    </div>

                    </div>
                <div class="my-follow">
                    <a class="infor" href=""><i class="ti-user"></i> 1000 followers</a>
                    <br>
                    <a class="infor" href=""><i class=" ti-eye"></i> 1 following</a>   
                    <ul>
                        <li>
                            <a href=""><i class=" ti-star"></i> 4.3 Trainer Rating</a>
                        </li>
                        <li>
                            <a href=""><i class=" ti-medall"></i> 16,973 Reviews</a>
                        </li>
                        <li>
                            <a href=""><i class=" ti-user"></i> 159,031 Attendes</a>
                        </li>
                        <li>
                            <a href=""><i class=" ti-control-play"></i>  104 courses</a>
                        </li>
                    </ul>
                </div>
                <div class="modal js-modal" style="display: none;">
                    <div class="modal-container js-modal-container">
                        <div class="modal-close js-modal-close">
                            <i class="ti-close"></i>
                        </div>            
                        <form action="{{url('/updateUser')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <label for="ticket-quantity"  class="modal-label">
                                    <i class="ti-user"></i>
                                    Name
                                </label>
                                <input id="ticket-quantity" type="text" name="fname" class="modal-input" placeholder="What name?">
                                
                                <label for="ticket-email"  class="modal-label">
                                    <i class="ti-user"></i>
                                    Nick name
                                </label>
                                <input id="ticket-email" type="username" name="username" class="modal-input" placeholder="Enter nick name...">
                
                                <label for="ticket-password"  class="modal-label">
                                    <i class="ti-user"></i>
                                    Password
                                </label>
                                <input id="ticket-password" type="password" name="password" class="modal-input" placeholder="Enter password...">
                                <div class="check">
                                    <button id="check-edit" type="submit" value="save">
                                        Save <i class="ti-check"></i>
                                    </button>
                                    <button id="check-edit" type="button" value="cancelProfile">
                                        cancel <i class="ti-check"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
            
                        <footer class="modal-footer">
                            <p class="modal-help">Need <a href="">help?</a></p>
                        </footer>
                    </div>
                </div>
                <!-- begin-payment -->
                <div class="payment-wrapper" style="display: none;">
                    <form action="{{url('/updateCash')}}" method="post">
                        @csrf
                        <div class="col-md-12 col-sm-12 p-10" id="payment_gateways">
                            <div class="uk-card-small">
                                 <span class="uk-h5"><b>&nbsp;Payment Methods</b></span>
                            </div>
                            <div class="tp-payment-method">
                                <div class="row paypal_button" style="display: block;">
                                    <label class="tp-payment-alt">
                                        <input type="radio" name="payment_method" id="paypal" value="paypal" disabled>
                                        <label for="paypal"><img src="{{url('profile')}}/img/paypal.png" alt="Tutorialspoint"></label>
                                        <p>Pay  with <b>PayPal</b> .</p>
                                    </label>
                                </div>
                                <div class="clear"></div>
                                <div class="row">
                                    <label class="tp-payment-alt">
                                        <input type="radio" name="payment_method" id="razorpay" value="razorpay" disabled> 
                                       <span>
                                           <img src="{{url('profile')}}/img/all-credit-card.png" alt="MasterCard" class="checkout-img">
                                        </span>
                                       <p>Pay securely by <b>Credit</b> / <b>Debit Card</b> / <b>Net Banking</b> / <b>UPI</b>/ Other </p>
                                    </label>											
                                </div>
                                <div class="clear"></div>
                                <div class="row stripe_button">
                                    <label class="tp-payment-alt">
                                        <input type="radio" name="payment_method" id="stripe" value="stripe" checked>
                                        <label for="stripe">
                                        <img width="45px" height="35px" src="{{url('profile')}}/img/cash.png" class="stripe-gateway-icon" alt="Stripe Tutorialspoint"></label>
                                        <p>Pay  with <b>Cash. </b><input id="ticket-quantity" name="cash" type="number" min="10" class="money-pay" placeholder="How much?"> </p>
                                    </label>
                                </div>                            
                                    <div class="clear"></div>
                                </div>
                            </div>
                        <div class="col-md-12 col-sm-12 summary-checkout">
                            <div>
                                <button type="submit" class="btn-checkout checkout">Checkout</button>
                                <button type="button" class="btn-checkout" value="cancelPayment">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right_inner">
                    <div class="exp goal">
                        <div class="title">
                            Courses
                        </div>
                    @foreach ($pack as $item)
                    <div class="source">
                        <div id="right_video">
                            <a href="{{url('ctqm-pack')}}/{{$item->pack_id}}">
                                <div id="right_video_tag">
                                    <font id="right_video_font">
                                        {{$item->pack_name}}
                                    </font>
                                </div>
                            </a>
                                <div class="video">
                            
                                    <div class="video_descrip">
                                        <span class="Label Label--secondary v-align-middle ml-1">
                                            @if ($item->price == 0) Free
                                            @else {{$item->price}}
                                            @endif
                                        </span>
                                    </div>
                                        <div class="more_details">
                                            <div class="more_details_1">
                                                <font class="video_details">
                                                    Process: {{$item->process}} At: {{$item->at}}
                                                </font>
                                            </div>
                                        </div>
                                </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>        
</body>

<script>
    // Lấy edit profile
    var edit = document.querySelector('button[value="edit-profile"]');
    edit.onclick = function(){
        document.querySelector('.js-modal').setAttribute("style", "");
    }

    // Tắt edit profile
    var editCancel = document.querySelector('button[value="cancelProfile"]');
    editCancel.onclick = function() {
        document.querySelector('.js-modal').setAttribute("style", "display: none;");
    }

    // Lấy payment
    var payment = document.querySelector('button[value="payment"]');
    payment.onclick = function(){
        document.querySelector('.payment-wrapper').setAttribute("style", "");
    }

    var paymentCancel = document.querySelector('button[value="cancelPayment"]');
    paymentCancel.onclick = function() {
        document.querySelector('.payment-wrapper').setAttribute("style", "display: none;");
    }
    
</script>
</html>

@stop()