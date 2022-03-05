<style>
  .dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0; 
 }
</style>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Covid-Free Hotel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="" aria-expanded="false">
            Services
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="available_services.php">Available Services</a></li>
            <li><a class="dropdown-item" href="services_use_criteria.php">Services Use</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="" data-bs-toggle="" aria-expanded="false">
            Views
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="customer_page.php">Customers</a></li>
            <li><a class="dropdown-item" href="sales_per_service.php">Sales per Service</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="" data-bs-toggle="" aria-expanded="false">
            Infection Tracing
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="insert_customer_for_inf_room.php">Rooms Visited by Covid-19 Case</a></li>
            <li><a class="dropdown-item" href="insert_customer_for_inf_cust.php">Potentialy Infected Customers from Covid-19 Case</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="" data-bs-toggle="" aria-expanded="false">
            Stats
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="freq_rooms_criteria.php">Most Frequently Visited Rooms</a></li>
            <li><a class="dropdown-item" href="freq_serv_criteria.php">Most Frequently Used Services</a></li>
            <li><a class="dropdown-item" href="pop_serv_criteria.php">Most Popular Services</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>