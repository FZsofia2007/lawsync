<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <title>About Us – LawSync</title>
  <link rel="stylesheet" href="{{ asset('css/register.css') }}">  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

</head>

<body>

  <header class="top-nav">
    <nav>
      <a href="/">MAIN PAGE</a>
      <a href="/about">ABOUT US</a>
      <a href="/team">THE TEAM</a>
      <a href="/services">SERVICES</a>
      <a href="/contact">CONTACT</a>
      <a href="/login">LOGIN</a>
      <a href="/register">REGISTER</a>
      <a href="/admin">ADMIN</a>
    </nav>
  </header>



  <div class="register-container">
    <img src="{{ asset('pictures/lawsync-logo.png') }}" alt="LawSync logo" class="logo">
    
    <h1>Register</h1>

    <form>
      <div class="form-group">
        <label for="firstname">First name</label>
        <input type="text" id="firstname" name="firstname" placeholder="Enter first name">
      </div>

      <div class="form-group">
        <label for="lastname">Last name</label>
        <input type="text" id="lastname" name="lastname" placeholder="Enter last name">
      </div>

      <div class="form-group">
        <label for="role">Role</label>
        <select id="role" name="role">
          <option value="client">customer</option>
          <option value="lawyer">lawyer</option>
        </select>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <div class="input-wrapper">
          <input type="password" id="password" name="password" placeholder="Enter password">
          <i class="bi bi-eye toggle-password"></i>
        </div>
      </div>

      <button type="submit">Register</button>
    </form>
  </div>

</body>

</html>