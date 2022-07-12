<footer class="bg-dark text-white mt-5">
	<div class="container pt-5 pb-5">
		<div class="row">
			<div class="col">
				<ul class="list-group list-group-horizontal justify-content-center">
					<li class="list-group-item bg-dark border-light">
						<p class="text-center mb-0">Омельянченко С.Н.</p>
					</li>
					<?php if( $telegram = get_field( 'telegram', 'options' ) ): ?>
						<li class="list-group-item bg-dark border-light">
							<a href="<?php echo $telegram; ?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512">
									<path fill="#fff" d="M248 8C111 8 0 119 0 256s111 248 248 248 248-111 248-248S385 8 248 8zm121.8 169.9l-40.7 191.8c-3 13.6-11.1 16.9-22.4 10.5l-62-45.7-29.9 28.8c-3.3 3.3-6.1 6.1-12.5 6.1l4.4-63.1 114.9-103.8c5-4.4-1.1-6.9-7.7-2.5l-142 89.4-61.2-19.1c-13.3-4.2-13.6-13.3 2.8-19.7l239.1-92.2c11.1-4 20.8 2.7 17.2 19.5z"/>
								</svg>
							</a>
						</li>
					<?php endif; ?>
					<?php if( $resume = get_field( 'resume', 'options' ) ): ?>
						<li class="list-group-item bg-dark border-light">
							<a href="<?php echo $resume; ?>">
								<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
									<path fill="#fff" d="M224 136V0H24C10.7 0 0 10.7 0 24v464c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H248c-13.2 0-24-10.8-24-24zm57.1 120H305c7.7 0 13.4 7.1 11.7 14.7l-38 168c-1.2 5.5-6.1 9.3-11.7 9.3h-38c-5.5 0-10.3-3.8-11.6-9.1-25.8-103.5-20.8-81.2-25.6-110.5h-.5c-1.1 14.3-2.4 17.4-25.6 110.5-1.3 5.3-6.1 9.1-11.6 9.1H117c-5.6 0-10.5-3.9-11.7-9.4l-37.8-168c-1.7-7.5 4-14.6 11.7-14.6h24.5c5.7 0 10.7 4 11.8 9.7 15.6 78 20.1 109.5 21 122.2 1.6-10.2 7.3-32.7 29.4-122.7 1.3-5.4 6.1-9.1 11.7-9.1h29.1c5.6 0 10.4 3.8 11.7 9.2 24 100.4 28.8 124 29.6 129.4-.2-11.2-2.6-17.8 21.6-129.2 1-5.6 5.9-9.5 11.5-9.5zM384 121.9v6.1H256V0h6.1c6.4 0 12.5 2.5 17 7l97.9 98c4.5 4.5 7 10.6 7 16.9z"/>
								</svg>
							</a>
						</li>
					<?php endif; ?>
				</ul>
				<p class="text-center mt-3 mb-0">Copyright © 2022</p>
			</div>
		</div>
	</div>
</footer>

<?php
wp_footer();
?>
</body>

</html>