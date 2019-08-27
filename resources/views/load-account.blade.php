@extends('layouts.admin')

@section('content')

<div class="container">
	<div class="card" style="width: 18rem;">
	  <img class="card-img-top" src="/images/load_account_img.png" alt="Card image cap">
	   <div>
	   	<center>
		   <div id="paypal-button" user_id = "{{ Auth::user()->id }}" wallet = " {{ Auth::user()->wallet }} "></div>
			<input id="hdn-token" class="hdn-token" type="hidden" name="_token" value="{{csrf_token()}}">
		</center>
		</div>		
	</div>


	
	
</div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript">

paypal.Button.render({

	env: 'sandbox',
	client: {
		sandbox: 'AaMMUDwoWFVTQxA9nw6Y4T5X_DtVvR9RGXMZSp2ZK67oBzHFDujlAlRXZ7PPVCC4MtGY3zaK00c8vmtH',
		production: 'demo_production_client_id'
	},

	locale: 'en_US',
	style: {
		size: 'medium',
		color: 'gold',
		shape: 'pill',

	},

	payment: function(data, actions){
		return actions.payment.create({
			transactions: [{
				amount: {
					total: '50.00',
					currency: 'USD'
				}
			}]
		});
	},

	onAuthorize: function(data, actions){
		return actions.payment.execute().then(function(){
			var id = $('#paypal-button').attr('user_id');
			var wallet = $('#paypal-button').attr('wallet');
			var token = $(".hdn-token").val();


			$.post('user1/' + id,
			{'id':id, 'wallet':wallet, '_token':token}, 
			function(data){

			

			 });       
			window.alert('Thank you for your purchase!');
			window.location.href = "{{route('product.index')}}";
		});
	}

	
}, '#paypal-button');

</script>

@endsection