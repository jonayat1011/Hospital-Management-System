<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"  href="Styles.css">
    <style>
        .inventoryBody {
            display: flex;
            flex-direction: column;
        }
        
        .userIdentity {
            width: 100%; /* Fixed width */
            padding: 4px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            box-sizing: border-box;
            border-radius: 8px;
            overflow-x: auto; /* Enable horizontal scrolling if necessary */
            background-color: #f2dede; /* Light Red */
            height: 40px; /* Fixed height */
            display: flex; /* Use flexbox */
            align-items: center; /* Align items vertically center */
        }
    .inventoryList {
    width: 50%;
    height: 960px ;
    float: left;
    background-color: lightblue;
    padding: 20px;
    box-sizing: border-box;
    overflow-x: auto;
  }

  .inventoryOperations {
    width: 49%;
    float: left;
    height: 960px ;
    background-color: lightgreen;
    padding: 20px;
    box-sizing: border-box;
    margin-left: 3px;
    overflow-x: auto;
  }
  .inventoryTable {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  .inventoryTable th, .inventoryTable td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  .inventoryTable th {
    background-color: #f2f2f2;
  }

  .inventoryTable tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  /* Style for Description column */
  .inventoryTable td.description {
    width: 200px; /* Set a fixed width for the column */
    overflow: hidden; /* Hide overflowing content */
    white-space: nowrap; /* Prevent text wrapping */
    text-overflow: ellipsis; /* Show ellipsis (...) for overflow */
  } 

  .inventoryOperations {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }

  /* Style for the search form */
  #searchForm {
    margin-bottom: 15px;
  }

  #searchForm label {
    margin-right: 10px;
    font-weight: bold;
  }

  #searchForm input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 200px;
    margin-right: 10px;
    font-size: 14px;
  }

  #searchForm button {
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
  }

  #searchForm button:hover {
    background-color: #0056b3;
  }

  /* Style for the search results container */
  #searchResults {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 3px;
    background-color: #fff;
  }

  /* Style for input fields */
  .inputField {
    margin-bottom: 10px;
  }

  /* Style for labels */
  .inputField label {
    display: inline-block;
    width: 150px;
    font-weight: bold;
  }
   .inventoryOperations {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
  }

  /* Style for the search form */
  #searchForm {
    margin-bottom: 15px;
  }

  #searchForm label {
    margin-right: 10px;
    font-weight: bold;
  }

  #searchForm input[type="text"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 3px;
    width: 200px;
    margin-right: 10px;
    font-size: 14px;
  }

  #searchForm button {
    padding: 8px 15px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
  }

  #searchForm button:hover {
    background-color: #0056b3;
  }

  /* Style for the search results container */
  #searchResults {
    border: 1px solid #ccc;
    padding: 10px;
    border-radius: 3px;
    background-color: #fff;
    margin-bottom: 15px;
  }

  /* Style for input fields */
  .inputField {
    margin-bottom: 10px;
  }

  /* Style for labels */
  .inputField label {
    display: inline-block;
    width: 150px;
    font-weight: bold;
  }

  /* Style for buttons */
  .operationButtons button {
    padding: 8px 15px;
    background-color: #28a745;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 14px;
    margin-right: 10px;
  }

  .operationButtons button:hover {
    background-color: #218838;
  }

  </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <div class="search-container">
        <input  type="text" class="search-bar" placeholder="Search...">
        <button class="search-btn">Search</button>
    </div>
    <div class="Profile">
        <img src="img/notification.jpeg" alt="Notification" class="round-btn" onclick="openNotification()">
        <img src="img/profile.png" alt="Profile" class="round-btn" onclick="openProfile()">
    </div>
</header>
<section>
    <nav>
        <div>
            <button class="navButton" onclick="openHome()">
                <img src="img/home" alt="Home">
                <span>Home</span>
            </button>
            <button class="navButton" onclick="openDashboard()">
                <img src="img/dashboard.png" alt="Dashboard">
                <span>Dashboard</span>
            </button>
            <button class="navButton" onclick="openHospitalSetup()">
                <img src="img/hospital.png" alt="Hospital Setup">
                <span>Hospital Setup</span>
            </button>
            <button class="navButtonOpen" onclick="openInventory()">
                <img src="img/inventory.png" alt="Inventory">
                <span>Inventory</span>
            </button>
            <button class="navButton" onclick="openReport()">
                <img src="img/report.png" alt="Report">
                <span>Report</span>
            </button>
            <button class="navButton" onclick="openSettings()">
                <img src="img/settings.png" alt="Settings">
                <span>Settings</span>
            </button>
            <button class="navButton" onclick="logout()">
                <img src="img/logout.png" alt="Logout">
                <span>Logout</span>
            </button>
        </div>
    </nav>


    <aside>
        <section class="inventoryBody">
            <div class="userIdentity">
                <?php $UserName="Jonayat"; ?>
                <p><b>Hey! <?php echo $UserName; ?> -</b> here's what's happening with your dashboard today ..</p>
            </div>
            <div class="inventoryListOperation">
                            
            <div class="inventoryList">
              <!-- Content for Inventory List -->
              <h2>Inventory List</h2>
              <table class="inventoryTable">
                <thead>
                  <tr>
                    <th>Inventory ID</th>
                    <th>Inventory Name</th>
                    <th>Available Inventory Quantity</th>
                    <th>Used Inventory Quantity</th>
                    <th>Inventory Description</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Sample data rows -->
                  <tr>
                    <td>1</td>
                    <td>Item A</td>
                    <td>10</td>
                    <td>2</td>
                    <td class="description">Description of Item A is very very very very very long and will overflow</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Item B</td>
                    <td>15</td>
                    <td>5</td>
                    <td class="description">Description of Item B is also very very very very very long and will overflow</td>
                  </tr>
                  <!-- Add more rows as needed -->
                </tbody>
              </table>
            </div>


<div class="inventoryOperations">
  <!-- Content for Inventory Operations -->
  <h2>Inventory Operations</h2>
  <p>Operations such as adding, deleting, updating items.</p>

  <!-- Search by ID form -->
  <form id="searchForm">
    <label for="searchId">Search by ID:</label>
    <input type="text" id="searchId" name="searchId">
    <button type="submit">Search</button>
  </form>

  <!-- Container for displaying search results -->
  <div id="searchResults">
    <!-- Input fields for all columns in the table -->
    <div class="inputField">
      <label for="inventoryId">Inventory ID:</label>
      <input type="text" id="inventoryId" name="inventoryId">
    </div>
    <div class="inputField">
      <label for="inventoryName">Inventory Name:</label>
      <input type="text" id="inventoryName" name="inventoryName">
    </div>
    <div class="inputField">
      <label for="availableQuantity">Available Quantity:</label>
      <input type="text" id="availableQuantity" name="availableQuantity">
    </div>
   
    <div class="inputField">
      <label for="inventoryDescription">Inventory Description:</label>
      <input type="text" id="inventoryDescription" name="inventoryDescription">
    </div>
  </div>
   <!-- Buttons for add, delete, update operations -->
  <div class="operationButtons">
    <button id="addButton">Add</button>
    <button id="deleteButton">Delete</button>
    <button id="updateButton">Update</button>
  </div>
</div>

            </div>
        </section>


    </aside>
</section>

<script>
        function openNotification() {
        // window.open('notification-page.html', '_blank');
    }

    function openProfile() {
        // window.open('profile-page.html', '_blank');
    }


    function openHome() {
        // Add functionality to open home page
        window.open('../../../Home/MVC/Views/home.php', '_blank');

    }
    function openDashboard() {
        // Add functionality to open dashboard page
        window.location.href = 'dashboard.php';
    }

    function openHospitalSetup() {
        // Add functionality to open hospital setup page
        window.location.href = 'hospitalsetup.php';

    }

    function openInventory() {
        // Add functionality to open inventory page
        window.location.href = 'inventory.php';
    }

    function openReport() {
        // Add functionality to open report page
        window.location.href = 'report.php';
    }

    function openSettings() {
        // Add functionality to open settings page
        window.location.href = 'settings.php';

    }
    function logout() {
        // Add functionality to logout
        window.location.href = '../../../Home/MVC/Views/home.php';
    }


</script>
</body>
</html>
