<style>
/* ============================
   SNOWFLAKE MODERN PAGE STYLING (reused for AWS page)
   ============================ */

/* Brand Colors */
:root {
    --ms-blue: #0f6cbd;
    --ms-dark: #1a1f36;
    --ms-soft-dark: #2c3248;
    --ms-light: #f5f8fc;
    --ms-accent: #c7d92a;
}

/* Page container spacing */
.ms-section {
    padding: 40px 0;
}

/* Titles */
.section-title {
    font-size: 2rem;
    font-weight: 800;
    color: var(--ms-dark);
    margin-bottom: 1.2rem;
    letter-spacing: -0.5px;
}

.ms-list-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: var(--ms-blue);
    margin-top: 40px;
}

/* Lead text */
.partner-lead {
    font-size: 1.05rem;
    line-height: 1.65;
    color: #4b5563;
}

/* ============================
   CARD STYLE SECTIONS
   ============================ */
.ms-card {
    background: #ffffff;
    border-radius: 16px;
    padding: 35px 40px;
    margin-bottom: 40px;
    box-shadow: 0 8px 28px rgba(0,0,0,0.06);
    transition: .3s;
}
.ms-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}

/* ----------------------------
   UL LIST MODERNIZATION
   ---------------------------- */
.ms-list {
    padding-left: 22px;
}
.ms-list li {
    margin-bottom: 6px;
    font-size: 1rem;
    line-height: 1.55;
    padding-left: 22px;
    position: relative;
}
.ms-list li::before {
    content: '▢';
    position: absolute;
    left: 0;
    color: var(--ms-blue);
    font-weight: bold;
    font-size: 1rem;
}

/* ----------------------------
   Badge Styling
   ---------------------------- */
.partner-badge {
    background: var(--ms-blue);
    color: #fff;
    padding: 8px 14px;
    border-radius: 30px;
    margin: 5px;
    font-weight: 600;
    display: inline-block;
    font-size: 0.85rem;
}

/* ----------------------------
   CTA BUTTON
   ---------------------------- */
.btn-cta {
    background: var(--ms-blue);
    color: #ffffff !important;
    padding: 13px 32px;
    font-size: 1.05rem;
    font-weight: 600;
    border-radius: 10px;
    text-decoration: none;
    transition: 0.3s;
}
.btn-cta:hover {
    background: #0c5aa2;
    transform: translateY(-3px);
}

/* ----------------------------
   Hero Image + Branding
   ---------------------------- */
.partner-brand-logo {
    max-width: 220px;
    filter: drop-shadow(0px 4px 10px rgba(0,0,0,0.1));
}

/* ----------------------------
   Section Divider line
   ---------------------------- */
hr {
    border-color: #e5e7eb;
}

/* ----------------------------
   Gradient Highlight Wrapper
   ---------------------------- */
.ms-highlight {
    background: linear-gradient(135deg, #0f6cbd 0%, #5ea0ef 100%);
    color: #fff;
    border-radius: 14px;
    padding: 24px 26px;
    margin-bottom: 40px;
    box-shadow: 0 12px 32px rgba(15,108,189,0.2);
}

/* ----------------------------
   MODERN CARD GRID
   ---------------------------- */
.modern-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 28px;
    margin-bottom: 40px;
}

.modern-card {
    background: linear-gradient(135deg, #f5f8fc 0%, #ffffff 100%);
    border: 1px solid rgba(15, 108, 189, 0.1);
    border-radius: 14px;
    padding: 32px;
    transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
}

.modern-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(90deg, #0f6cbd, #c7d92a);
    transition: height 0.35s ease;
}

.modern-card:hover {
    transform: translateY(-8px);
    border-color: #0f6cbd;
    box-shadow: 0 16px 48px rgba(15, 108, 189, 0.15);
}

.modern-card:hover::before {
    height: 6px;
}

.card-icon {
    font-size: 2.4rem;
    margin-bottom: 14px;
}

.card-title {
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--ms-dark);
    margin-bottom: 14px;
    line-height: 1.4;
}

.card-desc {
    font-size: 0.95rem;
    color: #4b5563;
    line-height: 1.6;
    margin-bottom: 16px;
}

.card-features {
    list-style: none;
    padding: 0;
    margin: 0;
}

.card-features li {
    font-size: 0.9rem;
    color: #5a6270;
    margin-bottom: 8px;
    padding-left: 22px;
    position: relative;
    line-height: 1.5;
}

.card-features li::before {
    content: '▢';
    position: absolute;
    left: 0;
    color: var(--ms-blue);
    font-weight: bold;
    font-size: 1.1rem;
}

.stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 24px;
    margin: 40px 0;
}

.stat-card {
    background: linear-gradient(135deg, #0f6cbd, #2e7dd4);
    color: white;
    border-radius: 12px;
    padding: 28px;
    text-align: center;
    box-shadow: 0 8px 24px rgba(15, 108, 189, 0.2);
    transition: transform 0.3s ease;
}

.stat-card:hover {
    transform: translateY(-6px);
}

.stat-number {
    font-size: 2.8rem;
    font-weight: 800;
    margin-bottom: 8px;
    color: white;
}

.stat-label {
    font-size: 1rem;
    font-weight: 600;
    line-height: 1.5;
}

.section-header {
    text-align: center;
    margin-bottom: 50px;
}

.section-header .section-title {
    margin-bottom: 16px;
}

.section-header .partner-lead {
    max-width: 600px;
    margin: 0 auto;
    color: #666;
}

/* ----------------------------
   Responsive Tweaks
   ---------------------------- */
@media(max-width: 768px){
    .ms-card { padding: 25px 22px; }
    .section-title { font-size: 1.65rem; }
    .modern-grid { grid-template-columns: 1fr; }
    .stats-grid { grid-template-columns: 1fr; }
}

</style>


<div class="mb-5">
    <div class="row align-items-center">
        <h4 class="section-title">AWS Partner Network Services Partner</h4>

        <div class="col-lg-7">
            <h4 class="partner-lead">Build. Modernize. Innovate.</h4>
            <p>Your cloud journey goals are attainable—no matter the size or scope. As an AWS Partner Network member and growing services partner, we apply future-focused best practices and hands-on experience to help you thrive in a technology-centric world. Achieve your business transformation goals and create limitless possibilities for the future.</p>
        </div>

        <div class="col-lg-5 text-center">
            <img loading="lazy" alt="aws-logo" class="mb-3" src="images/partners/aws.png">

            <div class="partner-badges mt-3 mx-auto" style="max-width:320px;">
                <div class="partner-badge partner-badge--premier">Services Partner</div>
                <div class="partner-badge partner-badge--partner">AWS Partner Network</div>
            </div>
        </div>
    </div>
</div>

<h3 class="section-title">Why Partner with Us?</h3>
<p class="partner-lead">The AWS Partner Network (APN) brings together technology and consulting partners who leverage AWS to build solutions and services for customers. As an active APN member, we're committed to growing our AWS expertise and delivering successful customer outcomes.</p>
<p class="partner-lead">We meet customers where they are on their cloud journey—whether just starting or executing on enterprise-wide transformation. Taking a customer-centric approach to understanding your business goals and priorities, we work collaboratively to jumpstart business transformation and maximize returns on technology investments.</p>

<h4 class="ms-list-title mt-4">Our Comprehensive Approach</h4>
<p class="partner-lead">From advisory, design, migration and implementation to adoption and innovation, we deliver end-to-end solutions that align with your strategic objectives.</p>

<h3 class="section-title mt-3">AWS Service Capabilities</h3>
<p class="partner-lead">Our team is actively building expertise across core AWS services and solution areas to support the breadth of your business goals. We're committed to continuous learning and certification to deliver high-quality AWS solutions.</p>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🛫</div>
        <h5 class="card-title">Cloud Migration & Modernization</h5>
        <p class="card-desc">Navigate your path from legacy infrastructure to cloud-native solutions.</p>
        <p class="card-desc">Move to the cloud with confidence using proven methodologies and AWS best practices. We help organizations migrate applications, databases, and workloads to AWS while minimizing risk and ensuring business continuity.</p>
        <ul class="card-features">
            <li>Cloud readiness assessment and planning</li>
            <li>Application discovery & portfolio analysis</li>
            <li>Migration strategy (6 R's framework)</li>
            <li>Proof-of-concept and pilot migrations</li>
            <li>Database migration & application execution</li>
            <li>Testing, cutover planning, and post-migration optimization</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">📊</div>
        <h5 class="card-title">Data & Analytics</h5>
        <p class="card-desc">Transform data into actionable insights using AWS analytics services.</p>
        <ul class="card-features">
            <li>Data lake architecture with Amazon S3</li>
            <li>Data warehousing with Amazon Redshift</li>
            <li>ETL with AWS Glue & real-time streaming with Kinesis</li>
            <li>BI with Amazon QuickSight and big data processing with EMR</li>
            <li>Data governance and security best practices</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">🛠️</div>
        <h5 class="card-title">Application Development & Modernization</h5>
        <p class="card-desc">Build and modernize cloud-native applications with AWS.</p>
        <ul class="card-features">
            <li>Microservices and containerization (ECS, EKS)</li>
            <li>Serverless with AWS Lambda & API Gateway</li>
            <li>CI/CD pipelines and application refactoring</li>
            <li>Legacy application modernization and re-platforming</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">🖧</div>
        <h5 class="card-title">Infrastructure & Cloud Operations</h5>
        <p class="card-desc">Design and operate scalable cloud infrastructure on AWS.</p>
        <ul class="card-features">
            <li>VPC, network design and connectivity</li>
            <li>Compute optimization (EC2, ECS, EKS, Lambda)</li>
            <li>Storage (S3, EBS, EFS, FSx) and HA/DR patterns</li>
            <li>IaC with CloudFormation and Terraform; monitoring & FinOps</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">🔐</div>
        <h5 class="card-title">Security & Compliance</h5>
        <p class="card-desc">Protect your AWS environment with proven controls and automation.</p>
        <ul class="card-features">
            <li>Security assessments & Well-Architected security reviews</li>
            <li>IAM, network segmentation, encryption, and DLP</li>
            <li>Security Hub, monitoring, incident response & automation</li>
            <li>Compliance frameworks and audit readiness</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">⚙️</div>
        <h5 class="card-title">DevOps & Automation</h5>
        <p class="card-desc">Accelerate delivery with DevOps practices and automation.</p>
        <ul class="card-features">
            <li>CI/CD pipeline design & automated testing</li>
            <li>Infrastructure as Code and config management</li>
            <li>Monitoring, observability and release management</li>
            <li>ChatOps and collaboration tooling</li>
        </ul>
    </div>
</div>

<h3 class="section-title">AWS Service Areas</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🖥️</div>
        <h5 class="card-title">Compute Services</h5>
        <ul class="card-features">
            <li>Amazon EC2, AWS Lambda, ECS & EKS</li>
            <li>AWS Batch, Lightsail, Elastic Beanstalk</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">💾</div>
        <h5 class="card-title">Storage Services</h5>
        <ul class="card-features">
            <li>Amazon S3, EBS, EFS, FSx</li>
            <li>AWS Storage Gateway & centralized backup</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">🗄️</div>
        <h5 class="card-title">Database Services</h5>
        <ul class="card-features">
            <li>Amazon RDS, Aurora, DynamoDB, ElastiCache</li>
            <li>Neptune, DocumentDB and managed database options</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">🌐</div>
        <h5 class="card-title">Networking & CDN</h5>
        <ul class="card-features">
            <li>Amazon VPC, Direct Connect, CloudFront</li>
            <li>Route 53, Transit Gateway, ELB</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">📈</div>
        <h5 class="card-title">Analytics Services</h5>
        <ul class="card-features">
            <li>Redshift, Athena, Glue, EMR, Kinesis, QuickSight</li>
        </ul>
    </div>

    <div class="modern-card">
        <div class="card-icon">🤖</div>
        <h5 class="card-title">Machine Learning & AI</h5>
        <ul class="card-features">
            <li>SageMaker, Bedrock, Rekognition, Comprehend, Forecast</li>
        </ul>
    </div>
</div>

<h3 class="section-title">Industry Solutions</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">⚕️</div>
        <h5 class="card-title">Healthcare & Life Sciences</h5>
        <p class="card-desc">HIPAA-compliant solutions, secure data exchange and research acceleration.</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🏦</div>
        <h5 class="card-title">Financial Services</h5>
        <p class="card-desc">Secure, compliant platforms for trading, risk, and customer apps.</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🏭</div>
        <h5 class="card-title">Manufacturing</h5>
        <p class="card-desc">IoT, analytics and ML for predictive maintenance and optimization.</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🛍️</div>
        <h5 class="card-title">Retail & E-Commerce</h5>
        <p class="card-desc">Scalable commerce platforms, personalization and inventory systems.</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🏛️</div>
        <h5 class="card-title">Public Sector</h5>
        <p class="card-desc">Secure, compliant modernization for government and education.</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🎬</div>
        <h5 class="card-title">Media & Entertainment</h5>
        <p class="card-desc">Content creation, processing and global delivery at scale.</p>
    </div>
</div>

<h3 class="section-title">Our Service Offerings</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🧭</div>
        <h5 class="card-title">Cloud Strategy & Advisory</h5>
        <ul class="card-features">
            <li>Cloud readiness assessment & TCO analysis</li>
            <li>Roadmaps, architecture workshops & PoCs</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🚚</div>
        <h5 class="card-title">Migration Services</h5>
        <ul class="card-features">
            <li>Application discovery, AWS Migration Hub, DMS, MGN</li>
            <li>Cutover planning, testing and go-live support</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🏗️</div>
        <h5 class="card-title">Implementation Services</h5>
        <ul class="card-features">
            <li>Solution architecture, deployment, integration & security</li>
            <li>Monitoring, logging and documentation</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🛡️</div>
        <h5 class="card-title">Managed Services</h5>
        <ul class="card-features">
            <li>24/7 monitoring, incident response, patching & reporting</li>
            <li>Performance optimization and cost management</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🎓</div>
        <h5 class="card-title">Training & Enablement</h5>
        <ul class="card-features">
            <li>AWS fundamentals, role-based training and cert prep</li>
            <li>Hands-on labs, workshops and architecture training</li>
        </ul>
    </div>
</div>

<h3 class="section-title">AWS Well-Architected Framework</h3>
<p class="partner-lead">We design and review solutions using the AWS Well-Architected Framework to ensure best practices across six pillars.</p>

<div class="modern-grid">
    <div class="modern-card"><div class="card-icon">⚙️</div><h5 class="card-title">Operational Excellence</h5><p class="card-desc">Run and monitor systems to deliver business value.</p></div>
    <div class="modern-card"><div class="card-icon">🔐</div><h5 class="card-title">Security</h5><p class="card-desc">Protect information, systems and assets.</p></div>
    <div class="modern-card"><div class="card-icon">🔁</div><h5 class="card-title">Reliability</h5><p class="card-desc">Ensure workloads perform consistently.</p></div>
    <div class="modern-card"><div class="card-icon">⚡</div><h5 class="card-title">Performance Efficiency</h5><p class="card-desc">Use computing resources efficiently.</p></div>
    <div class="modern-card"><div class="card-icon">💰</div><h5 class="card-title">Cost Optimization</h5><p class="card-desc">Deliver business value at lowest cost.</p></div>
    <div class="modern-card"><div class="card-icon">🌱</div><h5 class="card-title">Sustainability</h5><p class="card-desc">Minimize environmental impact and optimize energy use.</p></div>
</div>

<h3 class="section-title">Why AWS?</h3>

<div class="modern-grid">
    <div class="modern-card"><div class="card-icon">🌍</div><h5 class="card-title">Global Infrastructure</h5><p class="card-desc">Deploy across many regions and availability zones for low latency and high availability.</p></div>
    <div class="modern-card"><div class="card-icon">🧩</div><h5 class="card-title">Comprehensive Services</h5><p class="card-desc">200+ fully featured services across compute, storage, analytics, ML and more.</p></div>
    <div class="modern-card"><div class="card-icon">🔐</div><h5 class="card-title">Security & Compliance</h5><p class="card-desc">Build on secure infrastructure with broad compliance certifications.</p></div>
    <div class="modern-card"><div class="card-icon">🚀</div><h5 class="card-title">Innovation Velocity</h5><p class="card-desc">Continuous innovation with frequent service updates and new features.</p></div>
    <div class="modern-card"><div class="card-icon">💵</div><h5 class="card-title">Cost Efficiency</h5><p class="card-desc">Pay-as-you-go pricing and tools for cost management.</p></div>
    <div class="modern-card"><div class="card-icon">🏅</div><h5 class="card-title">Proven Track Record</h5><p class="card-desc">Trusted by millions of customers worldwide.</p></div>
</div>

<h3 class="section-title">Our Differentiators</h3>

<div class="modern-grid">
    <div class="modern-card"><div class="card-icon">🎓</div><h5 class="card-title">AWS Certified Professionals</h5><p class="card-desc">Certified architects, developers and sysops committed to continuous learning.</p></div>
    <div class="modern-card"><div class="card-icon">🤝</div><h5 class="card-title">Customer-First Approach</h5><p class="card-desc">Recommendations aligned to your business outcomes.</p></div>
    <div class="modern-card"><div class="card-icon">🧰</div><h5 class="card-title">Practical Experience</h5><p class="card-desc">Real-world delivery across industries and use cases.</p></div>
    <div class="modern-card"><div class="card-icon">⚡</div><h5 class="card-title">Agile Methodology</h5><p class="card-desc">Iterative delivery and rapid feedback loops.</p></div>
    <div class="modern-card"><div class="card-icon">🔁</div><h5 class="card-title">End-to-End Capabilities</h5><p class="card-desc">Strategy through managed services with single-partner accountability.</p></div>
    <div class="modern-card"><div class="card-icon">📈</div><h5 class="card-title">Growing AWS Partnership</h5><p class="card-desc">Active investment in certifications, competencies and customer success.</p></div>
</div>

<h3 class="section-title">Getting Started with AWS</h3>

<div class="modern-grid">
    <div class="modern-card"><div class="card-icon">🔎</div><h5 class="card-title">Assessment</h5><p class="card-desc">Understand environment, objectives and technical requirements.</p></div>
    <div class="modern-card"><div class="card-icon">🗺️</div><h5 class="card-title">Planning</h5><p class="card-desc">Migration plans, architecture designs and implementation roadmaps.</p></div>
    <div class="modern-card"><div class="card-icon">🚀</div><h5 class="card-title">Implementation</h5><p class="card-desc">Execute migration and deploy solutions using AWS best practices.</p></div>
    <div class="modern-card"><div class="card-icon">🔧</div><h5 class="card-title">Optimization & Support</h5><p class="card-desc">Continuously improve performance, security and cost efficiency.</p></div>
</div>

<h3 class="section-title">Ready to Start Your AWS Journey?</h3>
<p class="partner-lead">Whether you're exploring cloud possibilities, planning your first migration, or looking to optimize existing AWS workloads, we're here to help. Our team brings AWS expertise, proven methodologies, and commitment to your success.</p>

<a href="/contact" class="btn btn-cta mb-4">Get Started Today</a>

<div class="">
    <h5 class="ms-list-title">Connect with our AWS team to discuss your cloud goals and discover how we can help you:</h5>
    <ul class="ms-list mt-3">
        <li>Reduce infrastructure costs with cloud migration</li>
        <li>Improve application performance and scalability</li>
        <li>Accelerate innovation with cloud-native development</li>
        <li>Enhance security and compliance posture</li>
        <li>Build data analytics and ML capabilities</li>
        <li>Modernize legacy applications</li>
        <li>Establish DevOps practices and automation</li>
        <li>Optimize existing AWS environments</li>
    </ul>

    <p class="partner-lead mt-3">Contact us to schedule a consultation and learn how our AWS partnership can accelerate your cloud transformation.</p>
</div>

<p class="partner-lead">As an AWS Partner Network member, we're committed to helping organizations of all sizes achieve their cloud goals. With growing expertise, proven capabilities, and a customer-first approach, we're your trusted partner for building, modernizing, and innovating on AWS.</p>
