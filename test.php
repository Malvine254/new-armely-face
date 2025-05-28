<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Microsoft Fabric SKU Estimation Form</title>
  <style>
    body {
      font-family: "Segoe UI", sans-serif;
      background-color: #f9f9f9;
      padding: 30px;
      color: #333;
    }
    .box {
      background-color: #fff;
      border-left: 6px solid #0078D4;
      padding: 20px;
      margin-bottom: 25px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      border-radius: 6px;
    }
    .box h2 {
      margin-top: 0;
      color: #0078D4;
    }
    ul {
      padding-left: 20px;
    }
    ul li {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

  <div class="box">
    <h2>Data Information</h2>
    <ul>
      <li><strong>Total size of data:</strong> Estimated total size (after compression) that will reside in OneLake. Influences OneLake storage cost.</li>
      <li><strong>Number of daily batch cycles:</strong> Number of times ETL processes run per day. Affects compute usage.</li>
      <li><strong>Number of tables across all data sources:</strong> Helps evaluate the complexity of your data environment.</li>
    </ul>
  </div>

  <div class="box">
    <h2>Fabric Usage</h2>
    <ul>
      <li><strong>Data Factory:</strong> Use data integration features like pipelines and dataflows.</li>
      <li><strong>Data Warehouse:</strong> Enable SQL analytics features.</li>
      <li><strong>Data Science:</strong> Use machine learning models and experimentation tools.</li>
      <li><strong>Spark Jobs:</strong> Enable big data processing via Apache Spark.</li>
      <li><strong>Ad-Hoc SQL Analytics:</strong> Run SQL queries on OneLake without a dedicated warehouse.</li>
    </ul>
  </div>

  <div class="box">
    <h2>Power BI</h2>
    <ul>
      <li><strong>Power BI:</strong> Create interactive reports and dashboards.</li>
      <li><strong>Power BI Embedded:</strong> Embed Power BI visuals into custom applications.</li>
    </ul>
  </div>

  <div class="box">
    <h2>Real-Time Intelligence</h2>
    <ul>
      <li><strong>Event Stream:</strong> Capture and process streaming data.</li>
      <li><strong>Eventhouse:</strong> Store and query real-time data with KQL.</li>
      <li><strong>Activator:</strong> Trigger real-time alerts and automated actions.</li>
    </ul>
  </div>

  <div class="box">
    <h2>Microsoft Fabric Databases</h2>
    <ul>
      <li><strong>SQL database in Fabric:</strong> Host transactional SQL databases within Fabric.</li>
    </ul>
  </div>

  <div class="box">
    <h2>Additional Options</h2>
    <ul>
      <li><strong>Data Factory # Hours:</strong> Daily compute time required for data transformations.</li>
      <li><strong>Data Warehouse (for migrate experience):</strong> Indicates if you plan to migrate an existing data warehouse to Fabric.</li>
    </ul>
  </div>

  <div class="box">
    <h2>Power BI (Consumers)</h2>
    <ul>
      <li><strong>Report viewers:</strong> Users who access reports daily.</li>
      <li><strong>Report creators:</strong> Users building and maintaining reports.</li>
      <li><strong>Model size (optional):</strong> Estimated size of your Power BI dataset/model.</li>
    </ul>
  </div>

</body>
</html>
