<!doctype html>
<html lang="en"><!-- data-theme="dark" -->
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.min.css">
    <title>☀️ meteo</title>
    <style>
      :root {
        --spacing: 0.5rem;
      }

      [data-theme=light],
      :root:not([data-theme=dark]) {
        --error-color: red;
      }

      [data-theme=dark] {
        --error-color: red;
      }
      
      .error {
        color: var(--error-color);
      }
    </style>
    @yield('head')
  </head>
  <body>
    <nav class="container">
      <ul>
        <li><strong>☀️ <a href="{{ route('home') }}">meteo</a></strong></li>
      </ul>
      <ul>
        <li><a href="https://github.com/rognoni/meteo">GitHub</a></li>
        
        @guest<li><a href="#">Login</a></li>@endguest
      </ul>
    </nav>
    <main class="container">
        @yield('content')
    </main>
  </body>
</html>
