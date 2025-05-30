<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  .resource-card {
    position: relative;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    overflow: hidden;
    transition: transform 0.3s ease;
  }

  .resource-card:hover {
    transform: translateY(-5px);
  }

  .hot-badge {
    position: absolute;
    top: 12px;
    right: 12px;
    background: linear-gradient(45deg, #ff416c, #ff4b2b);
    color: #fff;
    padding: 4px 10px;
    border-radius: 50px;
    font-size: 0.75rem;
    font-weight: bold;
    animation: pulse 1.2s infinite;
    z-index: 2;
  }

  @keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.1); opacity: 0.85; }
    100% { transform: scale(1); opacity: 1; }
  }

  .card-img-top {
    height: 230px;
    object-fit: contain;
    padding: 20px;
    background-color: #f8f9fa;
  }

  .card-title {
    font-weight: 600;
  }

  .card-text {
    color: #6c757d;
  }

  .btn-primary {
    border-radius: 30px;
    padding: 6px 20px;
    font-weight: 600;
  }
</style>

<div class="container py-4">
  <div class="row g-4">
    <!-- Card 1 -->
    <div class="col-md-4">
      <div class="card resource-card h-100 text-center">
        <div class="hot-badge">🔥 Hot</div>
        <img src="/mnt/data/A_2D_digital_vector_graphic_illustrates_a_data_str.png" class="card-img-top" alt="Data Strategy">
        <div class="card-body">
          <h5 class="card-title">Data Strategy Template</h5>
          <p class="card-text">At Armely, our data strategy is designed to create measurable value across diverse sectors...</p>
          <a href="#" class="btn btn-primary">Get Now</a>
        </div>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="col-md-4">
      <div class="card resource-card h-100 text-center">
        <div class="hot-badge">🔥 Hot</div>
        <img src="/mnt/data/A_digital_vector_graphic_design_features_SQL_HEALT.png" class="card-img-top" alt="SQL Health Check">
        <div class="card-body">
          <h5 class="card-title">SQL Health Check</h5>
          <p class="card-text">In today's data-driven world, the reliability and performance of your SQL Server infrastructure is critical...</p>
          <a href="#" class="btn btn-primary">Get Now</a>
        </div>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="col-md-4">
      <div class="card resource-card h-100 text-center">
        <div class="hot-badge">🔥 Hot</div>
        <img src="/mnt/data/A_flat_digital_graphic_design_illustration_feature.png" class="card-img-top" alt="PowerBI Inventory">
        <div class="card-body">
          <h5 class="card-title">PowerBI Inventory</h5>
          <p class="card-text">As organizations increasingly rely on Microsoft Power Platform to drive digital transformation...</p>
          <a href="#" class="btn btn-primary">Get Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
