@extends('layouts.admin')

@section('content')

<div id = "content">
	
</div>

<script type="text/javascript">
$(document).ready(function() {
	function load(){
	  $("#content").html('<object width="100%" height="2000px" style="overflow:auto;" data="https://www.247virtualagent.com/virtual-assistants/" />');

	}

	
	  
	  load();
});
</script>
@endsection