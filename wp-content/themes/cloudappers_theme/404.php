<?php get_header(); ?>
<?php get_template_part('template-part', 'topnav'); ?>

	<section class="page-not-found">
		<div id="particles-js">
			<canvas class="particles-js-canvas-el" style="width: 100%; height: 100%;"></canvas>
		</div>

		<div class="container">
			<div class="text"><h1> CRAP! </h1>
                <p> Looks like you've hit a virtual roadblock.</p>
				<p>We'll work on making sure this never happens again.</p>
				<h2><a href="<?php echo esc_url(home_url()); ?>"> GET ME OUTTA HERE!</a></h2>
			</div>
		</div>

	</section>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
	<script type="application/javascript">
		particlesJS('particles-js', {
			'particles': {
				'number': {
					'value': 150,
					'density': {
						'enable': true,
						'value_area': 800
					}
				},
				'color': {'value': '#ffffff'},
				'shape': {
					'type': 'circle',
					'stroke': {
						'width': 0,
						'color': '#000000'
					},
					'polygon': {'nb_sides': 5},
					'image': {
						'src': 'img/github.svg',
						'width': 100,
						'height': 100
					}
				},
				'opacity': {
					'value': 0.5,
					'random': false,
					'anim': {
						'enable': false,
						'speed': 1,
						'opacity_min': 0.1,
						'sync': false
					}
				},
				'size': {
					'value': 3,
					'random': true,
					'anim': {
						'enable': false,
						'speed': 40,
						'size_min': 0.1,
						'sync': false
					}
				},
				'line_linked': {
					'enable': true,
					'distance': 150,
					'color': '#ffffff',
					'opacity': 0.4,
					'width': 1
				},
				'move': {
					'enable': true,
					'speed': 6,
					'direction': 'none',
					'random': false,
					'straight': false,
					'out_mode': 'out',
					'bounce': false,
					'attract': {
						'enable': false,
						'rotateX': 600,
						'rotateY': 1200
					}
				}
			},
			'interactivity': {
				'detect_on': 'canvas',
				'events': {
					'onhover': {
						'enable': true,
						'mode': 'grab'
					},
					'onclick': {
						'enable': true,
						'mode': 'push'
					},
					'resize': true
				},
				'modes': {
					'grab': {
						'distance': 140,
						'line_linked': {'opacity': 1}
					},
					'bubble': {
						'distance': 400,
						'size': 40,
						'duration': 2,
						'opacity': 8,
						'speed': 3
					},
					'repulse': {
						'distance': 200,
						'duration': 0.4
					},
					'push': {'particles_nb': 4},
					'remove': {'particles_nb': 2}
				}
			},
			'retina_detect': true
		});
	</script>
<?php get_footer(); ?>