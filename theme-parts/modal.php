<div class="modal micromodal-slide" id="modal">
	<div class="modal__overlay" data-custom-close>
		<div class="modal__container">
			<header class="modal__header">
				<h2 class="modal__title">Apply Now</h2>
				<button class="modal__close" title="Закрыть" data-custom-close></button>
			</header>
			<form id="form" action="" method="post"    class="form"> 
				<label for="name"> 
			  </label>       
				<input type="text" 
				name="name" 
				id="name"
				placeholder="Your Name..."
				class="name">
				<input type="tel" name="phone" placeholder="Your Phone...">
				<textarea name="commentary" rows="4" placeholder="Commentary"></textarea>
				<input type="hidden" name="form">
					<label class="agreement" for="agreement">
					<input type="checkbox" name="agreement" id="agreement">
					<span class="text">I agreed with terms of use</span>
					<span class="marker"></span>
				  </label>
				<div class="modal__footer">
					<button class="button">Send</button>
				</div>
			</form>
		</div>
	</div>
</div>   