<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Partner Logo Slider</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @keyframes scroll-slow {
      0% {
        transform: translateX(0%);
      }
      100% {
        transform: translateX(-50%);
      }
    }

    .animate-scroll-slow {
      animation: scroll-slow 30s linear infinite;
    }
  </style>
</head>
<body class="bg-white">

  <section class="py-10">
    <h2 class="text-center text-xl md:text-2xl font-semibold text-gray-800 mb-8">
      Trusted by Leading Technology Partners
    </h2>

    <div class="overflow-hidden">
      <div class="flex space-x-12 animate-scroll-slow items-center px-4 w-max">
        <!-- Partner Logos (repeat once for smooth loop) -->
        <img src="logos/td-synnex.png" alt="TD SYNNEX" class="h-12 object-contain" />
        <img src="logos/microsoft.png" alt="Microsoft" class="h-12 object-contain" />
        <img src="logos/google-cloud.png" alt="Google Cloud" class="h-12 object-contain" />
        <img src="logos/aws.png" alt="Amazon Web Services" class="h-12 object-contain" />
        <img src="logos/snowflake.png" alt="Snowflake" class="h-12 object-contain" />
        <img src="logos/talend.png" alt="Talend" class="h-12 object-contain" />

        <!-- Repeat logos for seamless scrolling -->
        <img src="logos/td-synnex.png" alt="TD SYNNEX" class="h-12 object-contain" />
        <img src="logos/microsoft.png" alt="Microsoft" class="h-12 object-contain" />
        <img src="logos/google-cloud.png" alt="Google Cloud" class="h-12 object-contain" />
        <img src="logos/aws.png" alt="Amazon Web Services" class="h-12 object-contain" />
        <img src="logos/snowflake.png" alt="Snowflake" class="h-12 object-contain" />
        <img src="logos/talend.png" alt="Talend" class="h-12 object-contain" />
      </div>
    </div>
  </section>

</body>
</html>
