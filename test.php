<?php include 'php/actions.php'; include 'php/header_footer.php';?>

<!-- Start of Header Area -->
<?php  echo getHeader("social impact"); ?>
<!-- End Header Area -->
  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Segoe UI', sans-serif;
    }
    .hero {
      background: linear-gradient(135deg, #4f46e5, #3b82f6);
      color: white;
      padding: 3rem 2rem;
      border-radius: 1rem;
      margin-bottom: 2rem;
    }
    .section {
      background-color: #ffffff;
      padding: 2rem;
      border-radius: 1rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      margin-bottom: 2rem;
    }
    .boxed-list {
      display: grid;
      gap: 1rem;
      margin-top: 1rem;
    }
    .boxed-item {
      border: 1px solid #e2e8f0;
      background-color: #f8fafc;
      border-radius: 0.75rem;
      padding: 1rem 1.25rem;
      box-shadow: 0 1px 2px rgba(0,0,0,0.03);
      display: flex;
      gap: 0.75rem;
      align-items: flex-start;
    }
    .boxed-item::before {
      content: '▢';
      color: #3b82f6;
      font-weight: bold;
      margin-top: 0.1rem;
    }
    .boxed-item strong {
      color: #2563eb;
    }
    .cta-btn {
      background-color: #3b82f6;
      color: white;
      font-weight: bold;
    }
    .cta-btn:hover {
      background-color: #2563eb;
    }
  </style>
</head>
<body>

  <div class="container my-5">
    <div class="hero text-center default-background ">
      <h1 class="display-5 fw-bold text-light">Ready to See AI in Action?</h1>
      <p class="lead mt-3 text-light">Let’s get you started with low-risk Proof of Concept Starter Pack!</p>
    </div>

    <div class="section">
      <p>
        Have you been wondering how AI could actually help your business? Its time to stop wondering and start seeing for yourself!
        Our AI Proof of Concept (PoC) Starter Pack is your friendly, fast-track ticket to understanding how AI can make a real difference, specifically for what you do.
      </p>
      <p>
        We get it – jumping into AI can seem like a huge leap. That's exactly why we made this Starter Pack super easy to try out.
        It's low risk, packed with potential, and designed to give you awesome insights.
        You'll get a clear, hands-on look at AI solving a specific challenge in your company, all ZERO commitment and ZERO budget.
      </p>
    </div>

    <div class="section">
      <h4>Don’t just take our word for it! With our AI PoC Starter Pack, you will:</h4>
      <div class="boxed-list">
        <div class="boxed-item "><strong class="default-color">See immediate value:</strong> Witness AI solve a real problem for your business in weeks, not months.</div>
        <div class="boxed-item"><strong class="default-color">De-risk your AI journey:</strong> Test the waters with a clear scope and predefined outcomes, minimizing uncertainty.</div>
        <div class="boxed-item"><strong class="default-color">Gain actionable insights:</strong> Understand exactly how AI can optimize your operations, boost efficiency, or unlock new opportunities.</div>
        <div class="boxed-item"><strong class="default-color">Empower your team:</strong> Provide concrete examples of AI's capabilities, fostering internal buy-in and innovation.</div>
        <div class="boxed-item"><strong class="default-color">Build a strong foundation:</strong> Lay the groundwork for future, larger-scale AI initiatives with confidence.</div>
      </div>
    </div>

    <div class="section">
      <h4>Just imagine…</h4>
      <div class="boxed-list">
        <div class="boxed-item">Quickly draft personalized internal communications, summarize documents, or generate training materials from your secure, internal data.</div>
        <div class="boxed-item">Automate tedious manual processes like sorting inquiries or processing reports, freeing your team for strategic tasks, all without exposing sensitive data externally.</div>
        <div class="boxed-item">Power a smart internal chatbot with AI to answer HR questions or provide policy access, all from your internal knowledge base.</div>
        <div class="boxed-item">Streamlining data entry and validation for critical internal systems with Intelligent Automation, slashing errors and speeding up workflows, all while keeping your data strictly confidential.</div>
      </div>
    </div>

    <div class="section text-center">
      <p class="fs-5">This isn't a demo; it's a personalized exploration of AI's potential for your business.</p>
      <a href="#request" class="btn btn-lg cta-btn mt-3  default-background">Click here to request your AI Proof of Concept Starter Pack</a>
    </div>
  </div>

</body>
</html>
