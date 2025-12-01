<style>
/* ============================
   SNOWFLAKE MODERN PAGE STYLING
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
            <h4 class="section-title" >Snowflake Elite Services Partner</h4>

            <div class="col-lg-7">
                <h4 class="partner-lead">Mobilize Your Data. Unleash AI. Transform Everything.</h4>
                <p>In the age of AI and data-driven decision making, your organization needs more than just storage—you need a platform that turns data into strategic advantage. As a Snowflake Elite Services Partner, the highest tier in the Snowflake Partner Network—we help organizations unlock the full potential of the AI Data Cloud. From data warehousing to data engineering, data lakes to data sharing, AI and machine learning to data applications, we deliver end-to-end Snowflake solutions that mobilize your data and accelerate business transformation.
                </p>
            </div>

            <div class="col-lg-5 text-center">
                <img loading="lazy" alt="snowflake-logo" class="partner-brand-logo mb-3" src="images/partners/snowflake.png">

                <div class="partner-badges mt-3 mx-auto" style="max-width:320px;">
                    <div class="partner-badge partner-badge--premier">Elite</div>
                    <div class="partner-badge partner-badge--partner">Services Partner</div>
                </div>
            </div>
        </div>
</div>

<hr class="my-5">

<h3 class="section-title">Why Partner with Us?</h3>
<p class="partner-lead">
    Snowflake Elite Services Partners represent the pinnacle of expertise within the Snowflake ecosystem. This prestigious designation recognizes partners who have demonstrated exceptional technical proficiency, significant customer success, and deep commitment to the Snowflake Data Cloud platform.
</p>
<p class="partner-lead">
    We meet you where you are on your data modernization journey—whether migrating from legacy data warehouses, consolidating disparate data sources, building AI-powered applications, or establishing data sharing ecosystems. Taking a business-outcome-focused approach, we align Snowflake's capabilities with your strategic objectives to unlock insights, reduce costs, and enable data-driven innovation.
</p>

<h4 class="ms-list-title mt-4">Our Comprehensive Approach</h4>
<p class="partner-lead">
    From strategy and architecture through migration, implementation, optimization, and managed services, we deliver integrated Snowflake solutions that maximize your data investment and create lasting competitive advantage.
</p>

<hr class="my-5">

<h2 class="section-title">Snowflake Elite Partner Designation</h2>
<p class="partner-lead">
    Elite tier represents the highest designation in the Snowflake Partner Network, distinguishing our exceptional expertise in maximizing business value from the AI Data Cloud.
</p>

<h4 class="ms-list-title mt-4">What Elite Status Means for You</h4>
<ul class="ms-list">
    <li><strong>Proven Expertise:</strong> Our team maintains the highest concentration of SnowPro-certified professionals across Core, Advanced, and specialized certifications including Data Engineering, Architecture, Data Science, and Administration.</li>
    <li><strong>Priority Access:</strong> Direct access to Snowflake product teams, engineering support, and early releases ensures your projects benefit from the latest innovations and best practices.</li>
    <li><strong>Validated Success:</strong> Elite status is earned through demonstrated customer success, technical excellence, and significant Snowflake deployment experience across industries and use cases.</li>
    <li><strong>Strategic Alignment:</strong> Deep partnership with Snowflake ensures our solutions leverage the full platform capabilities and align with Snowflake's product roadmap and innovations.</li>
</ul>

<hr class="my-5">

<h3 class="section-title">Snowflake AI Data Cloud Capabilities</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🚀</div>
        <h5 class="card-title">Data Warehouse Migration</h5>
        <p class="card-desc">Seamless transitions from legacy platforms</p>
        <ul class="card-features">
            <li>Legacy warehouse assessment</li>
            <li>Migration strategy & roadmap</li>
            <li>Automated code conversion</li>
            <li>Schema design optimization</li>
            <li>Data validation & reconciliation</li>
            <li>Phased migration with zero downtime</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🎯</div>
        <h5 class="card-title">Supported Migration Paths</h5>
        <p class="card-desc">Migrate from any legacy data warehouse</p>
        <ul class="card-features">
            <li>Oracle Exadata migration</li>
            <li>Teradata to Snowflake</li>
            <li>IBM Netezza migration</li>
            <li>SQL Server conversion</li>
            <li>Amazon Redshift migration</li>
            <li>BigQuery to Snowflake</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🏗️</div>
        <h5 class="card-title">Platform Capabilities</h5>
        <p class="card-desc">Build elastic, scalable data platforms</p>
        <ul class="card-features">
            <li>Medallion architecture design</li>
            <li>Data lakehouse implementation</li>
            <li>Batch & streaming ingestion</li>
            <li>ELT/ETL pipeline development</li>
            <li>Data transformation with dbt</li>
            <li>Task orchestration & scheduling</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🔒</div>
        <h5 class="card-title">Engineering Best Practices</h5>
        <p class="card-desc">Optimize architecture & security</p>
        <ul class="card-features">
            <li>Zero-copy cloning</li>
            <li>Time Travel recovery</li>
            <li>Resource monitors & governance</li>
            <li>Role-based access control</li>
            <li>Column-level security</li>
            <li>Query performance tuning</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">💾</div>
        <h5 class="card-title">Lakehouse Architecture</h5>
        <p class="card-desc">Unify structured & unstructured data</p>
        <ul class="card-features">
            <li>Support for all data formats</li>
            <li>Native JSON & Parquet handling</li>
            <li>External table integration</li>
            <li>Storage & compute separation</li>
            <li>Query acceleration service</li>
            <li>Open catalog integration</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🐍</div>
        <h5 class="card-title">Snowpark Development</h5>
        <p class="card-desc">Build data-intensive applications</p>
        <ul class="card-features">
            <li>Python-based pipelines</li>
            <li>Custom transformation logic</li>
            <li>ML model training & scoring</li>
            <li>User-defined functions</li>
            <li>Pandas API support</li>
            <li>Native application development</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🤖</div>
        <h5 class="card-title">ML Capabilities</h5>
        <p class="card-desc">Integrated machine learning platform</p>
        <ul class="card-features">
            <li>ML Functions & classification</li>
            <li>Popular ML framework integration</li>
            <li>Feature store management</li>
            <li>Model registry & versioning</li>
            <li>Batch & real-time inference</li>
            <li>AutoML for data scientists</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">✨</div>
        <h5 class="card-title">Generative AI & LLMs</h5>
        <p class="card-desc">Built-in AI and language models</p>
        <ul class="card-features">
            <li>Snowflake Cortex AI</li>
            <li>Document AI extraction</li>
            <li>Cortex semantic search</li>
            <li>RAG implementations</li>
            <li>LLM fine-tuning</li>
            <li>OpenAI & AWS Bedrock integration</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🔗</div>
        <h5 class="card-title">Data Sharing & Collaboration</h5>
        <p class="card-desc">Securely share live data</p>
        <ul class="card-features">
            <li>Secure partner sharing</li>
            <li>Data monetization</li>
            <li>Cross-cloud sharing</li>
            <li>Private data exchanges</li>
            <li>Data clean rooms</li>
            <li>Live data distribution</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🛍️</div>
        <h5 class="card-title">Snowflake Marketplace</h5>
        <p class="card-desc">Access third-party data & apps</p>
        <ul class="card-features">
            <li>Weather & financial data</li>
            <li>Industry-specific datasets</li>
            <li>Data enrichment services</li>
            <li>Native applications</li>
            <li>Free & paid listings</li>
            <li>Custom data exchanges</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Business Intelligence & Analytics</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">📊</div>
        <h5 class="card-title">Modern Analytics Architecture</h5>
        <p class="card-desc">Enterprise BI platform integration</p>
        <ul class="card-features">
            <li>Tableau & Power BI</li>
            <li>Looker & Sigma Computing</li>
            <li>ThoughtSpot & Qlik</li>
            <li>Custom analytics apps</li>
            <li>Embedded analytics</li>
            <li>Real-time dashboards</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">📈</div>
        <h5 class="card-title">Semantic Layer & Metrics</h5>
        <p class="card-desc">Business-friendly metrics layer</p>
        <ul class="card-features">
            <li>Business-friendly naming</li>
            <li>Certified datasets</li>
            <li>Conformed dimensions</li>
            <li>Pre-aggregated layers</li>
            <li>Data dictionary</li>
            <li>Lineage & impact analysis</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Data Governance & Security</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🔐</div>
        <h5 class="card-title">Enterprise Data Governance</h5>
        <p class="card-desc">Centralized access & policies</p>
        <ul class="card-features">
            <li>RBAC & ABAC controls</li>
            <li>Tag-based policies</li>
            <li>Dynamic data masking</li>
            <li>Row & column-level security</li>
            <li>Audit logging</li>
            <li>Policy enforcement</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">✅</div>
        <h5 class="card-title">Privacy & Compliance</h5>
        <p class="card-desc">Regulatory framework compliance</p>
        <ul class="card-features">
            <li>GDPR compliance</li>
            <li>HIPAA architectures</li>
            <li>PCI DSS protection</li>
            <li>SOC 2 controls</li>
            <li>Data residency management</li>
            <li>Compliance automation</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">📋</div>
        <h5 class="card-title">Data Quality & Observability</h5>
        <p class="card-desc">Quality monitoring & insights</p>
        <ul class="card-features">
            <li>Automated quality checks</li>
            <li>Anomaly detection</li>
            <li>Schema monitoring</li>
            <li>Data freshness tracking</li>
            <li>Lineage visualization</li>
            <li>SLA monitoring</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Industry Solutions</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🏦</div>
        <h5 class="card-title">Financial Services</h5>
        <p class="card-desc">Fraud detection, risk modeling & compliance</p>
        <ul class="card-features">
            <li>Customer 360 & behavior analytics</li>
            <li>Fraud detection & prevention</li>
            <li>Risk modeling & stress testing</li>
            <li>Regulatory reporting automation</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">⚕️</div>
        <h5 class="card-title">Healthcare & Life Sciences</h5>
        <p class="card-desc">Patient analytics & clinical research</p>
        <ul class="card-features">
            <li>Patient 360 & care coordination</li>
            <li>Clinical data analytics</li>
            <li>Population health management</li>
            <li>Drug discovery & development</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🛒</div>
        <h5 class="card-title">Retail & Consumer Goods</h5>
        <p class="card-desc">Omnichannel analytics & optimization</p>
        <ul class="card-features">
            <li>Customer 360 & personalization</li>
            <li>Omnichannel analytics</li>
            <li>Inventory optimization</li>
            <li>Demand forecasting</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🏭</div>
        <h5 class="card-title">Manufacturing & IoT</h5>
        <p class="card-desc">Predictive maintenance & operations</p>
        <ul class="card-features">
            <li>Predictive maintenance analytics</li>
            <li>Quality control & root cause</li>
            <li>Supply chain optimization</li>
            <li>Equipment performance monitoring</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">📺</div>
        <h5 class="card-title">Media & Entertainment</h5>
        <p class="card-desc">Audience analytics & engagement</p>
        <ul class="card-features">
            <li>Audience analytics & segmentation</li>
            <li>Content performance optimization</li>
            <li>Recommendation engines</li>
            <li>Churn prediction</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">💻</div>
        <h5 class="card-title">Technology & SaaS</h5>
        <p class="card-desc">Product analytics & customer insights</p>
        <ul class="card-features">
            <li>Product analytics & telemetry</li>
            <li>Customer usage analytics</li>
            <li>Multi-tenant architecture</li>
            <li>Data-as-a-service</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Snowflake Services & Solutions</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🗺️</div>
        <h5 class="card-title">Assessment & Strategy</h5>
        <p class="card-desc">Strategic planning & roadmap</p>
        <ul class="card-features">
            <li>Data landscape analysis</li>
            <li>Business value identification</li>
            <li>TCO & ROI modeling</li>
            <li>Architecture design</li>
            <li>PoC development</li>
            <li>Change management</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">⚙️</div>
        <h5 class="card-title">Implementation & Migration</h5>
        <p class="card-desc">End-to-end deployment</p>
        <ul class="card-features">
            <li>Account setup & config</li>
            <li>Warehouse design</li>
            <li>Security configuration</li>
            <li>ETL/ELT development</li>
            <li>Testing & validation</li>
            <li>Go-live support</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🛡️</div>
        <h5 class="card-title">Managed Services</h5>
        <p class="card-desc">24/7 support & optimization</p>
        <ul class="card-features">
            <li>Platform monitoring</li>
            <li>Performance optimization</li>
            <li>Cost monitoring</li>
            <li>Security monitoring</li>
            <li>Disaster recovery</li>
            <li>Business reviews</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">💰</div>
        <h5 class="card-title">Cost Optimization</h5>
        <p class="card-desc">Reduce data platform spend</p>
        <ul class="card-features">
            <li>Warehouse utilization analysis</li>
            <li>Query optimization</li>
            <li>Storage optimization</li>
            <li>Resource right-sizing</li>
            <li>Cache optimization</li>
            <li>Budget forecasting</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Snowflake Training & Enablement</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">👨‍💼</div>
        <h5 class="card-title">Executive Briefings</h5>
        <p class="card-desc">Business-focused workshops and strategy sessions</p>
        <ul class="card-features">
            <li>Executive briefings</li>
            <li>Business value workshops</li>
            <li>Strategy alignment sessions</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🔧</div>
        <h5 class="card-title">Technical Bootcamps</h5>
        <p class="card-desc">Hands-on training for technical teams</p>
        <ul class="card-features">
            <li>Data engineer bootcamps</li>
            <li>Advanced technical workshops</li>
            <li>Hands-on labs and exercises</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">👨‍🏫</div>
        <h5 class="card-title">Role-Based Programs</h5>
        <p class="card-desc">Tailored training for specific roles</p>
        <ul class="card-features">
            <li>Data analyst and business user training</li>
            <li>Administrator and security training</li>
            <li>Developer training for Snowpark</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🏆</div>
        <h5 class="card-title">SnowPro Certification</h5>
        <p class="card-desc">Prepare for industry-recognized certifications</p>
        <ul class="card-features">
            <li>SnowPro certification preparation</li>
            <li>Exam readiness programs</li>
            <li>Ongoing learning support</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🎯</div>
        <h5 class="card-title">Center of Excellence</h5>
        <p class="card-desc">Build organizational capability and governance</p>
        <ul class="card-features">
            <li>Governance framework and policies</li>
            <li>Best practices documentation</li>
            <li>Champions program development</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">📚</div>
        <h5 class="card-title">Ongoing Support</h5>
        <p class="card-desc">Continuous learning and knowledge sharing</p>
        <ul class="card-features">
            <li>Custom training for use cases</li>
            <li>Train-the-trainer programs</li>
            <li>Office hours and ongoing support</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Technology Integrations</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">☁️</div>
        <h5 class="card-title">Cloud Platform Integration</h5>
        <p class="card-desc">Seamless multi-cloud connectivity</p>
        <ul class="card-features">
            <li>AWS S3, Lambda, Glue, SageMaker</li>
            <li>Azure Data Factory, Synapse, Databricks</li>
            <li>Google Cloud Storage, Dataflow, BigQuery</li>
            <li>Cross-cloud data sharing</li>
            <li>Private connectivity & cloud-native auth</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🔄</div>
        <h5 class="card-title">Data Integration Tools</h5>
        <p class="card-desc">Unified data ingestion and orchestration</p>
        <ul class="card-features">
            <li>Fivetran for automated data ingestion</li>
            <li>Matillion for cloud-native ETL</li>
            <li>Informatica enterprise integration</li>
            <li>dbt for analytics engineering</li>
            <li>Apache Airflow & Kafka for streaming</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">📊</div>
        <h5 class="card-title">Business Intelligence Tools</h5>
        <p class="card-desc">Enterprise analytics and visualization</p>
        <ul class="card-features">
            <li>Tableau for visual analytics</li>
            <li>Power BI for Microsoft ecosystem</li>
            <li>Looker for embedded analytics</li>
            <li>Qlik for associative exploration</li>
            <li>ThoughtSpot & Sigma Computing</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Snowflake Native Applications</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🐍</div>
        <h5 class="card-title">Python & Java Development</h5>
        <p class="card-desc">Build powerful applications with native language support</p>
        <ul class="card-features">
            <li>Python and Java application development</li>
            <li>Secure data access within customer accounts</li>
            <li>Custom processing logic</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🎨</div>
        <h5 class="card-title">Interactive Applications</h5>
        <p class="card-desc">Create engaging user experiences with Streamlit</p>
        <ul class="card-features">
            <li>Streamlit for interactive applications</li>
            <li>Custom visualizations and dashboards</li>
            <li>Real-time user interactions</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">🤖</div>
        <h5 class="card-title">ML Model Deployment</h5>
        <p class="card-desc">Deploy and operationalize machine learning models</p>
        <ul class="card-features">
            <li>Machine learning model deployment</li>
            <li>Custom data processing pipelines</li>
            <li>Automated workflows</li>
        </ul>
    </div>
    <div class="modern-card">
        <div class="card-icon">📦</div>
        <h5 class="card-title">Marketplace Distribution</h5>
        <p class="card-desc">Share and monetize applications globally</p>
        <ul class="card-features">
            <li>Marketplace distribution</li>
            <li>Easy customer installation</li>
            <li>Automatic updates</li>
        </ul>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Why Snowflake?</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🏗️</div>
        <h5 class="card-title">Architecture Innovation</h5>
        <p class="card-desc">Built for the cloud from the ground up with elastic scalability</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🔧</div>
        <h5 class="card-title">Near-Zero Maintenance</h5>
        <p class="card-desc">Focus on insights, not infrastructure management</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">⚡</div>
        <h5 class="card-title">Performance at Scale</h5>
        <p class="card-desc">Query petabytes in seconds with unmatched speed</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🔐</div>
        <h5 class="card-title">Secure Data Sharing</h5>
        <p class="card-desc">Collaborate without data movement or complex ETL</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🌐</div>
        <h5 class="card-title">Multi-Cloud & Cross-Cloud</h5>
        <p class="card-desc">Avoid vendor lock-in with true multi-cloud flexibility</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">💵</div>
        <h5 class="card-title">Consumption-Based Pricing</h5>
        <p class="card-desc">Pay only for what you use with transparent cost control</p>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Our Differentiators</h3>

<div class="modern-grid">
    <div class="modern-card">
        <div class="card-icon">🏆</div>
        <h5 class="card-title">Deep Snowflake Expertise</h5>
        <p class="card-desc">SnowPro certified professionals with extensive implementation experience</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">📚</div>
        <h5 class="card-title">Proven Methodologies</h5>
        <p class="card-desc">Battle-tested implementation approach across industries and use cases</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🔗</div>
        <h5 class="card-title">End-to-End Capabilities</h5>
        <p class="card-desc">Full spectrum of services from strategy through optimization</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🎯</div>
        <h5 class="card-title">Industry Expertise</h5>
        <p class="card-desc">Deep vertical knowledge and tailored solutions</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">⭐</div>
        <h5 class="card-title">Elite Partner Benefits</h5>
        <p class="card-desc">Premier status with direct Snowflake access and priority support</p>
    </div>
    <div class="modern-card">
        <div class="card-icon">🚀</div>
        <h5 class="card-title">Innovation Focus</h5>
        <p class="card-desc">Cutting-edge solutions leveraging latest Snowflake capabilities</p>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Success Metrics & Recognition</h3>

<div class="stats-grid">
    <div class="stat-card">
        <div class="stat-number">500+</div>
        <div class="stat-label">Successful Implementations</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">10PB+</div>
        <div class="stat-label">Data Migrated</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">50+</div>
        <div class="stat-label">Countries Deployed</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">97%</div>
        <div class="stat-label">Customer Satisfaction</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">3x</div>
        <div class="stat-label">Performance Gain</div>
    </div>
    <div class="stat-card">
        <div class="stat-number">40%</div>
        <div class="stat-label">Cost Reduction</div>
    </div>
</div>

<hr class="my-5">

<h3 class="section-title">Ready to Unlock the Power of Your Data?</h3>
<p class="partner-lead">
    Start your Snowflake journey with an Elite partner who has the expertise, experience, and commitment to ensure your success.
</p>

<p class="partner-lead">
    Whether you're migrating from a legacy data warehouse, building a modern data platform, enabling AI and ML, or creating data-sharing ecosystems, we have the capabilities to help you succeed.
</p>

<h4 class="ms-list-title mt-4">Get Started Today</h4>

<ul class="ms-list">
    <li>Reduce data warehouse costs by 40–60%</li>
    <li>Improve query performance by 3–10x</li>
    <li>Enable self-service analytics for business users</li>
    <li>Accelerate time-to-insight from weeks to hours</li>
    <li>Build AI and ML applications on your data</li>
    <li>Monetize data through secure sharing</li>
    <li>Eliminate data silos and enable collaboration</li>
    <li>Scale data operations without scaling teams</li>
</ul>

<p class="partner-lead mt-3">
    Contact us to schedule a complimentary Snowflake assessment and learn how our Elite Partnership can accelerate your data cloud transformation.
</p>

<a href="/contact" class="btn btn-cta mb-5">Get Started Today</a>

<hr class="my-5">

<p class="partner-lead">
    As a Snowflake Elite Services Partner, we're committed to helping organizations of all sizes unlock the full potential of the AI Data Cloud. 
    With proven expertise, comprehensive capabilities, and a customer-first approach, we're your trusted partner for data warehousing, 
    data engineering, AI and ML, data sharing, and cloud-native data applications on Snowflake.
</p>
