-- SQL INSERT Commands for Services (23 Total Services)
-- Execute these commands in your database to populate the services_lists table

-- AI Services (4 services)
INSERT INTO services_lists (title, image, body) VALUES 
('AI Consulting', 'icofont-brain', 'Strategic guidance on artificial intelligence implementation, helping businesses identify opportunities and develop comprehensive AI strategies tailored to their specific needs.'),
('AI Advisory', 'icofont-lightbulb', 'Expert advisory services for AI adoption, providing insights on AI technologies, best practices, and organizational transformation for maximum impact.'),
('Generative AI', 'icofont-sparkle', 'Cutting-edge generative AI solutions including ChatGPT integration, large language models, and custom AI applications for business transformation.'),
('AI PoC Starter', 'icofont-rocket', 'Accelerated proof of concept program for AI implementation with 4-week timeline, expert team, and actionable deliverables to validate AI solutions.');

-- Data Services (7 services)
INSERT INTO services_lists (title, image, body) VALUES 
('Estimate your Fabric Capacity', 'icofont-calculator', 'Professional capacity planning and cost estimation for Microsoft Fabric, helping organizations optimize cloud infrastructure investments.'),
('Microsoft Fabric', 'icofont-database', 'Unified analytics platform for modern data engineering, featuring lake-centric architecture, real-time analytics, and AI-driven insights.'),
('Data Science and Analytics', 'icofont-chart', 'Advanced analytics and data science services including predictive modeling, statistical analysis, and machine learning implementations.'),
('Data Strategy', 'icofont-strategy', 'Comprehensive data strategy consulting to help organizations build data-driven cultures and maximize data asset value.'),
('Databricks', 'icofont-cloud', 'Apache Spark-based analytics platform enabling unified data, AI, and SQL workloads with collaborative workspace and enterprise governance.'),
('Snowflake', 'icofont-snow', 'Cloud data warehouse solutions providing scalable, performant analytics with native support for structured and semi-structured data.'),
('SQL & Data Warehousing', 'icofont-database', 'Enterprise data warehousing solutions using SQL Server and cloud platforms, optimized for complex analytics and reporting requirements.');

-- Digital Transformation (8 services)
INSERT INTO services_lists (title, image, body) VALUES 
('API Data Access', 'icofont-link', 'Secure API integration and data access solutions enabling seamless connectivity between systems and applications.'),
('Microsoft PowerApps', 'icofont-app', 'Low-code platform for building custom business applications without traditional coding, accelerating digital transformation.'),
('Microsoft Power Automate', 'icofont-lightning', 'Workflow automation and RPA solutions automating business processes, improving efficiency and reducing manual tasks.'),
('Microsoft Power Virtual Agents', 'icofont-speech', 'Intelligent chatbot platform enabling conversational AI for customer support, lead qualification, and employee assistance.'),
('Microsoft Power Pages', 'icofont-web', 'Low-code portal builder for creating professional business websites and customer engagement portals without coding expertise.'),
('Microsoft Dynamics 365', 'icofont-business', 'Enterprise resource planning and customer relationship management suite for comprehensive business management and automation.'),
('Robotic Processing Automation', 'icofont-robot', 'RPA solutions automating repetitive business processes, improving accuracy, reducing costs, and freeing teams for strategic work.'),
('SharePoint Online', 'icofont-folder', 'Enterprise content management and collaboration platform enabling document sharing, team collaboration, and knowledge management.');

-- Managed Services (2 services)
INSERT INTO services_lists (title, image, body) VALUES 
('SQL Server Support', 'icofont-shield', 'Comprehensive managed support for SQL Server including monitoring, maintenance, performance optimization, and 24/7 technical assistance.'),
('Applications Support', 'icofont-headset', 'Managed application support services providing 24/7 monitoring, issue resolution, performance optimization, and proactive maintenance.');

-- Advisory/Other Services (1 service)
INSERT INTO services_lists (title, image, body) VALUES 
('Freemiums', 'icofont-gift', 'Specialized consulting for freemium business models, helping companies balance free offerings with monetization strategies.');

-- OPTIONAL: If you want to organize by categories, you can add a category column first:
-- ALTER TABLE services_lists ADD COLUMN category VARCHAR(50);

-- Then update the categories:
-- UPDATE services_lists SET category = 'AI' WHERE title IN ('AI Consulting', 'AI Advisory', 'Generative AI', 'AI PoC Starter');
-- UPDATE services_lists SET category = 'Data' WHERE title IN ('Estimate your Fabric Capacity', 'Microsoft Fabric', 'Data Science and Analytics', 'Data Strategy', 'Databricks', 'Snowflake', 'SQL & Data Warehousing');
-- UPDATE services_lists SET category = 'Digital' WHERE title IN ('API Data Access', 'Microsoft PowerApps', 'Microsoft Power Automate', 'Microsoft Power Virtual Agents', 'Microsoft Power Pages', 'Microsoft Dynamics 365', 'Robotic Processing Automation', 'SharePoint Online');
-- UPDATE services_lists SET category = 'Managed' WHERE title IN ('SQL Server Support', 'Applications Support');
-- UPDATE services_lists SET category = 'Advisory' WHERE title = 'Freemiums';

-- Count by category:
-- SELECT category, COUNT(*) as total FROM services_lists GROUP BY category;
-- SELECT COUNT(*) as total FROM services_lists;
