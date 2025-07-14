<footer class="bg-base-200 p-8">
  <div class="flex flex-col">
    
    <!-- Top Row: SVG / Header / Connect -->
    <div class="flex justify-between items-center px-10 mb-8">
      
      <!-- SVG Section -->
      <div class="flex-shrink-0">
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="150" height="150" class="mb-4">
          <svg viewBox="0 0 100 150" xmlns="http://www.w3.org/2000/svg">
            <path d="M30 20 C30 60, 30 120, 50 120 C70 120, 70 60, 70 20" stroke="goldenrod" stroke-width="8" fill="none"></path>
            <circle cx="50" cy="70" r="5" fill="red"></circle>
          </svg>
        </svg>
      </div>

      <!-- Header Section -->
      <div class="text-center">
        <h3 class="shree text-2xl font-bold text-primary" data-trans="footer.temple_name"></h3>
        <p class="shree opacity-70" data-trans="footer.location"></p>
      </div>

      <!-- Connect Section -->
      <div class="space-y-2 flex-shrink-0 text-right">
        <h4 class="text-base font-semibold mb-3" data-trans="footer.connect"></h4>
        <div class="space-y-1">
          <p class="text-sm flex items-center gap-2 justify-end">
            <span>📍</span>
            <span data-trans="footer.address"></span>
          </p>
          <p class="text-sm flex items-center gap-2 justify-end">
            <span>🕐</span>
            <span data-trans="footer.timings"></span>
          </p>
          <p class="text-sm flex items-center gap-2 justify-end">
            <span>📞</span>
            <span data-trans="footer.phone"></span>
          </p>
        </div>
      </div>
    </div>

    <!-- Divider -->
    <hr class="border-t border-neutral opacity-30 my-6" />

    <!-- Bottom Text -->
    <div class="text-center">
      <p class="shree text-sm font-medium text-primary" data-trans="footer.tagline"></p>
      <p class="shree text-xs opacity-70" data-trans="footer.copyright"></p>
    </div>

  </div>
</footer>
