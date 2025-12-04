<?php include 'php/actions.php';?>
<?php include 'php/header_footer.php';  echo getHeader("services");?>
<!-- Start of Header Area -->
<!-- End Header Area -->

<!-- Breadcrumbs -->
		<div class="breadcrumbs overlay">
			<div class="container">
				<div class="bread-inner">
					<div class="row">
						<div class="col-12">
							<h2>Services</h2>
							<ul class="bread-list">
								<li><a href="/">Home</a></li>
								<li><i class="icofont-simple-right"></i></li>
								<li class="active">Services</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->

<!-- Service Navigation & Filters -->
<section class="service-navigation">
	<div class="container">
		<div class="service-search-box">
			<input type="text" id="serviceSearch" placeholder="Search services...">
			<i class="fa fa-search"></i>
		</div>
		<div class="category-filters">
			<button class="filter-btn active" data-filter="all">
				All <span class="service-count" id="count-all">0</span>
			</button>
			<button class="filter-btn" data-filter="data">
				Data <span class="service-count" id="count-data">0</span>
			</button>
			<button class="filter-btn" data-filter="digital">
				Digital <span class="service-count" id="count-digital">0</span>
			</button>
			<button class="filter-btn" data-filter="ai">
				AI & ML <span class="service-count" id="count-ai">0</span>
			</button>
			<button class="filter-btn" data-filter="managed">
				Managed <span class="service-count" id="count-managed">0</span>
			</button>
			<button class="filter-btn" data-filter="advisory">
				Advisory <span class="service-count" id="count-advisory">0</span>
			</button>
		</div>
	</div>
</section>

<style>
	/* Service Navigation */
	.service-navigation {
		background: white;
		padding: 20px 0;
		box-shadow: 0 2px 8px rgba(0,0,0,0.05);
		margin-bottom: 30px;
	}

	.service-search-box {
		max-width: 600px;
		margin: 0 auto 15px;
		position: relative;
	}

	.service-search-box input {
		width: 100%;
		padding: 12px 45px 12px 20px;
		border: 2px solid #e0e0e0;
		border-radius: 8px;
		font-size: 1rem;
		transition: border-color 0.3s ease;
	}

	.service-search-box input:focus {
		outline: none;
		border-color: #2f5597;
	}

	.service-search-box i {
		position: absolute;
		right: 20px;
		top: 50%;
		transform: translateY(-50%);
		color: #999;
	}

	.category-filters {
		display: flex;
		justify-content: center;
		gap: 8px;
		flex-wrap: wrap;
	}

	.filter-btn {
		padding: 8px 20px;
		border: 1px solid #ddd;
		background: white;
		color: #666;
		border-radius: 20px;
		cursor: pointer;
		transition: all 0.3s ease;
		font-size: 0.9rem;
	}

	.filter-btn:hover {
		border-color: #2f5597;
		color: #2f5597;
	}

	.filter-btn.active {
		background: #2f5597;
		color: white;
		border-color: #2f5597;
	}

	.service-count {
		margin-left: 5px;
		opacity: 0.8;
		font-size: 0.85rem;
	}

	.no-results {
		text-align: center;
		padding: 40px 20px;
		color: #999;
	}

	.no-results i {
		font-size: 3rem;
		color: #ddd;
		margin-bottom: 15px;
	}

	@media (max-width: 768px) {
		.category-filters {
			overflow-x: auto;
			justify-content: flex-start;
			flex-wrap: nowrap;
			padding-bottom: 10px;
		}

		.filter-btn {
			white-space: nowrap;
		}
	}
</style>


<!-- Pricing Table -->
<section class="pricing-table mt-5" id="services-list">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title"> 
	<h2>Empowering Your Tech Journey</h2>
		<center><hr class="default-background hr" ></center>
		<p>Our experts provide tailored guidance in areas such as business planning, product development, marketing, financial management, and risk management, ensuring your company's competitiveness and sustainable growth.</p>
</div>
</div>
</div>

<!-- No Results Message -->
<div id="noResults" class="no-results" style="display: none;">
	<i class="fa fa-search"></i>
	<h3>No Services Found</h3>
	<p>Try adjusting your search or filter to find what you're looking for.</p>
</div>

<div class="row" id="servicesContainer">
<!-- Single Table -->
<?php displayServicesList(); ?>
<!-- End Single Table-->

</div>	
</div>	
</section>	
<!--/ End Pricing Table -->

<script>
document.addEventListener('DOMContentLoaded', function() {
	const searchInput = document.getElementById('serviceSearch');
	const filterBtns = document.querySelectorAll('.filter-btn');
	const categoryCards = document.querySelectorAll('.category-card');
	const servicesContainer = document.getElementById('servicesContainer');
	const noResults = document.getElementById('noResults');
	
	let currentFilter = 'all';
	let searchTerm = '';

	// Search functionality
	searchInput.addEventListener('input', function() {
		searchTerm = this.value.toLowerCase();
		filterServices();
	});

	// Filter buttons
	filterBtns.forEach(btn => {
		btn.addEventListener('click', function() {
			const filter = this.getAttribute('data-filter');
			activateFilter(filter);
		});
	});

	function activateFilter(filter) {
		currentFilter = filter;
		
		// Update active button
		filterBtns.forEach(btn => btn.classList.remove('active'));
		document.querySelector(`[data-filter="${filter}"]`).classList.add('active');
		
		// Filter services
		filterServices();
	}

	function filterServices() {
		const services = servicesContainer.querySelectorAll('.single-table');
		let visibleCount = 0;

		// Service mapping based on exact header menu structure - optimized for database content
		const serviceMap = {
			'ai': [
				'ai consulting',
				'ai advisory',
				'generative',
				'poc',
				'copilot'
			],
			'data': [
				'fabric',
				'data science',
				'analytics',
				'data strategy',
				'databricks',
				'snowflake',
				'sql',
				'warehouse'
			],
			'digital': [
				'api',
				'powerapps',
				'power automate',
				'automate',
				'virtual agent',
				'power pages',
				'dynamics',
				'robotic',
				'rpa',
				'sharepoint'
			],
			'managed': [
				'sql server support',
				'sql support',
				'support',
				'managed'
			]
		};

		services.forEach(service => {
			const title = service.querySelector('h2') ? service.querySelector('h2').textContent.toLowerCase() : '';
			const description = service.querySelector('p') ? service.querySelector('p').textContent.toLowerCase() : '';
			const fullText = (title + ' ' + description).toLowerCase();
			
			// Determine category by checking service map
			let category = 'other';
			
			for (const [cat, keywords] of Object.entries(serviceMap)) {
				if (keywords.some(keyword => fullText.includes(keyword))) {
					category = cat;
					break;
				}
			}
			
			// Freemiums goes to advisory
			if (title.includes('freemium')) {
				category = 'advisory';
			}

			// Check if service matches current filter and search
			const matchesFilter = currentFilter === 'all' || category === currentFilter;
			const matchesSearch = searchTerm === '' || 
			                     title.includes(searchTerm) || 
			                     description.includes(searchTerm);

			if (matchesFilter && matchesSearch) {
				service.style.display = '';
				visibleCount++;
				
				// Add fade-in animation
				service.style.animation = 'fadeIn 0.5s ease';
			} else {
				service.style.display = 'none';
			}
		});

		// Show/hide no results message
		if (visibleCount === 0) {
			noResults.style.display = 'block';
			noResults.style.animation = 'fadeIn 0.5s ease';
		} else {
			noResults.style.display = 'none';
		}

		// Update counts
		updateCounts();
	}

	function updateCounts() {
		const services = servicesContainer.querySelectorAll('.single-table');
		const counts = {
			all: 0,
			data: 0,
			digital: 0,
			ai: 0,
			managed: 0,
			advisory: 0
		};

		// Service mapping based on exact header menu structure - optimized for database content
		const serviceMap = {
			'ai': [
				'ai consulting',
				'ai advisory',
				'generative',
				'poc',
				'copilot'
			],
			'data': [
				'fabric',
				'data science',
				'analytics',
				'data strategy',
				'databricks',
				'snowflake',
				'sql',
				'warehouse'
			],
			'digital': [
				'api',
				'powerapps',
				'power automate',
				'automate',
				'virtual agent',
				'power pages',
				'dynamics',
				'robotic',
				'rpa',
				'sharepoint'
			],
			'managed': [
				'sql server support',
				'sql support',
				'support',
				'managed'
			]
		};

		services.forEach(service => {
			const title = service.querySelector('h2') ? service.querySelector('h2').textContent.toLowerCase() : '';
			const description = service.querySelector('p') ? service.querySelector('p').textContent.toLowerCase() : '';
			const fullText = (title + ' ' + description).toLowerCase();
			
			counts.all++;
			
			// Categorize by checking service map
			for (const [cat, keywords] of Object.entries(serviceMap)) {
				if (keywords.some(keyword => fullText.includes(keyword))) {
					counts[cat]++;
					return;
				}
			}
			
			// Freemiums goes to advisory
			if (title.includes('freemium')) {
				counts.advisory++;
			}
		});

		// Update count badges
		Object.keys(counts).forEach(key => {
			const countElement = document.getElementById(`count-${key}`);
			if (countElement) {
				countElement.textContent = counts[key];
			}
		});
	}

	// Add fade-in animation
	const style = document.createElement('style');
	style.textContent = `
		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(10px); }
			to { opacity: 1; transform: translateY(0); }
		}
	`;
	document.head.appendChild(style);

	// Initial count update
	updateCounts();

	// Smooth scroll for all internal links
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			const href = this.getAttribute('href');
			if (href !== '#' && href !== '#consultation-form') {
				e.preventDefault();
				const target = document.querySelector(href);
				if (target) {
					target.scrollIntoView({ behavior: 'smooth', block: 'start' });
				}
			}
		});
	});
});
</script>


<!-- Start Appointment -->
<section class="appointment">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="section-title">
	<h2 id="consultation-form">Schedule a Consultation Today</h2>
	<center><hr class="default-background hr" ></center>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12 col-md-6 col-12 d-flex  default-background mb-5">
<form class="form p-5" id="consultation-form-action" method="post">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group input-with-background">
				<label class="text-start text-light">Full Name *</label>
				<input required class="remove-input-background" name="name" type="text" placeholder="Name">
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-12">
			<div class="form-group">
				<label class="text-start text-light">Email Address *</label>
				<input required class="remove-input-background" name="email" type="email" placeholder="Email">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<label class="text-start text-light">Phone Number *</label>
				<input required class="remove-input-background" name="phone" type="text" placeholder="Phone">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<label class="text-start text-light">Organization Name *</label>
				<input required class="remove-input-background" name="organization" type="text" placeholder="Organization Name">
			</div>
		</div>
		<div class="col-lg-4 col-md-4 col-12">
			<div class="form-group">
				<label class="text-start text-light">Service of Interest *</label>
				<select required name="service_type"  class="form-control remove-input-background" id="validationServer03" placeholder="Organization Name">
          <option value="" disabled selected>Select Service of Interest</option> 
          <option value="Data Services">Data Services</option>
          <option value="Web Development">Web Development</option>
          <option value="Business Intelligence">Business Intelligence</option>
          <option value="Managed Services">Managed Services</option>
          <option value="Advisory Services">Advisory Services</option>
      </select>
			</div>
		</div>
		
                     
		<div class="col-lg-12 col-md-12 col-12">
			<div class="form-group">
				<label class="text-start text-light">Message  *</label>
				<textarea required class="remove-input-background" name="message" placeholder="Write Your Message Here....."></textarea>
			</div>
		</div>
		<div class="form-group ml-3">
			<div class="button">
				<button type="submit" name="submit_consultation_form" class="btn send-message-btn">Send Message</button>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5 col-md-4 col-12">
			
		</div>
	</div>
</form>
</div>
</div>

</div>
</section>
<!-- End Appointment -->

<?php echo getFooter(); ?>