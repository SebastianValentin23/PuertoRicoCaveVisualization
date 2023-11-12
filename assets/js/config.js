//Login page
            document.addEventListener("DOMContentLoaded", function() {
				var isLoggedIn = sessionStorage.getItem('isLoggedIn');
				var logoutLink = document.getElementById("logoutLink"); 
                if (isLoggedIn === "true") {
                    var loginLink = document.getElementById("loginLink");
                    if (isLoggedIn) {
                        loginLink.innerHTML = "<a href='#'>Acosta</a>"; 
                    }
					if(logoutLink) {
						logoutLink.style.display = "inline-block"
					}
					
                }else{
					var adminLink = document.getElementById("adminLink");
					var creationLink = document.getElementById("creationLink");
					/*if (adminLink) {
                        adminLink.style.display = "none"; 
                    }
					if (creationLink) {
                        creationLink.style.display = "none"; 
                    }*/
					
				}
				logoutLink.addEventListener('click', function(){
					sessionStorage.removeItem('isLoggedIn');
					window.location.reload();
				});
				
            });
			
            document.addEventListener("DOMContentLoaded", function() {
				var isLoggedIn = sessionStorage.getItem('isLoggedIn');
				var logoutLink = document.getElementById("logoutLink"); 
                if (isLoggedIn === "true") {
                    var loginLink = document.getElementById("loginLink");
                    if (isLoggedIn) {
                        loginLink.innerHTML = "<a href='#'>Acosta</a>"; 
                    }
					if(logoutLink) {
						logoutLink.style.display = "inline-block"
					}
					
                }else{
					var adminLink = document.getElementById("adminLink");
					var creationLink = document.getElementById("creationLink");
					/*if (adminLink) {
                        adminLink.style.display = "none"; 
                    }
					if (creationLink) {
                        creationLink.style.display = "none"; 
                    }*/
					
				}
				logoutLink.addEventListener('click', function(){
					sessionStorage.removeItem('isLoggedIn');
					window.location.reload();
				});
				
            });
//Login page script	            
        document.addEventListener("DOMContentLoaded", function() {
            var isLoggedIn = false; 

            var loginForm = document.getElementById('loginForm');
            var usernameField = document.getElementById('username');
            var passwordField = document.getElementById('password');

            loginForm.addEventListener('submit', function(event) {
                event.preventDefault();

                if (usernameField.value === "Acosta" && passwordField.value === "1234") {
                    isLoggedIn = true; 
                    redirectToIndex(isLoggedIn);
                } else {
                    alert("Invalid credentials. Please try again.");
                }
            });

            function redirectToIndex(isLoggedIn) {
                if (isLoggedIn) {
                    sessionStorage.setItem('isLoggedIn', 'true');
                    var indexURL = "index.html";
                    window.location.href = indexURL;
                }
            }
        });
//Cave Page Script
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('caveForm').addEventListener('submit', function(event) {
                event.preventDefault();

                var name = document.getElementById('caveName').value.toLowerCase();
                var town = document.getElementById('town').value;
                var biodiversityFilters = Array.from(document.querySelectorAll('input[type=checkbox]:checked')).map(function(checkbox) {
                    return checkbox.id;
                });

                var caves = [
                {
                    name: 'Mystic Cave',
                    town: 'Camuy',
                    biodiversity: ['Guano', 'Reptilia', 'Plants', 'Liches'],
                    size: '23.6 GB',
                    date: '2023-10-12'
                },
                {
                    name: 'Crystal Cave',
                    town: 'Camuy',
                    biodiversity: ['Curstecea', 'Algae'],
                    size: '13.4 GB',
                    date: '2023-09-25'
                },
                {
                    name: 'Echo Cave',
                    town: 'Arecibo',
                    biodiversity: ['Guano', 'Insecta', 'Fungi'],
                    size: '10.1 GB',
                    date: '2023-08-17'
                },
                {
                    name: 'Glowing Grotto',
                    town: 'Fajardo',
                    biodiversity: ['Amphibians', 'Algae'],
                    size: '47.6 GB',
                    date: '2023-07-05'
                },
                {
                    name: 'Emerald Cavern',
                    town: 'Ponce',
                    biodiversity: ['Guano', 'Reptilia', 'Fungi'],
                    size: '23.2 GB',
                    date: '2023-06-12'
                }
                ];

        
                var filteredCaves = caves.filter(function(cave) 
                {
                    return (name === '' || cave.name.toLowerCase().includes(name)) &&
                        (town === '' || cave.town === town) &&
                        (biodiversityFilters.length === 0 || biodiversityFilters.every(function(filter) {
                            return cave.biodiversity.includes(filter);
                        }));
                });
                displayCaves(filteredCaves);
            });

            function displayCaves(caves) {
                var table = document.getElementById('cavesTable');
                var tbody = table.querySelector('tbody');
                if (tbody) {
                    table.removeChild(tbody);
                }
                tbody = document.createElement('tbody');


                var row = tbody.insertRow();
                row.insertCell().appendChild(document.createTextNode("Cave Name"));
                row.insertCell().appendChild(document.createTextNode("Town"));
                row.insertCell().appendChild(document.createTextNode("Biodiversity"));
                row.insertCell().appendChild(document.createTextNode("Cave Size (3D Model)"));
                row.insertCell().appendChild(document.createTextNode("Date Created"));
                caves.forEach(function(cave) {
                    var row = tbody.insertRow();
                    var nameCell = row.insertCell();
                    nameCell.innerHTML = `<a href="cave-template.html">${cave.name}</a>`;
                    row.insertCell().appendChild(document.createTextNode(cave.town));
                    row.insertCell().appendChild(document.createTextNode(cave.biodiversity.join(', ')));
                    row.insertCell().appendChild(document.createTextNode(cave.size));
                    row.insertCell().appendChild(document.createTextNode(cave.date));
                });

                table.appendChild(tbody);
            }
        });
//Admin page Script
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('caveForm').addEventListener('submit', function(event) {
                event.preventDefault();

                var name = document.getElementById('caveNames').value.toLowerCase();
                var town = document.getElementById('town').value;
                var biodiversityFilters = Array.from(document.querySelectorAll('input[type=checkbox]:checked')).map(function(checkbox) {
                    return checkbox.id;
                });

                var caves = [
                {
                    name: 'Mystic Cave',
                    town: 'Camuy',
                    biodiversity: ['Guano', 'Reptilia', 'Plants', 'Liches'],
                    size: '23.6 GB',
                    date: '2023-10-12'
                },
                {
                    name: 'Crystal Cave',
                    town: 'Camuy',
                    biodiversity: ['Curstecea', 'Algae'],
                    size: '13.4 GB',
                    date: '2023-09-25'
                },
                {
                    name: 'Echo Cave',
                    town: 'Arecibo',
                    biodiversity: ['Guano', 'Insecta', 'Fungi'],
                    size: '10.1 GB',
                    date: '2023-08-17'
                },
                {
                    name: 'Glowing Grotto',
                    town: 'Fajardo',
                    biodiversity: ['Amphibians', 'Algae'],
                    size: '47.6 GB',
                    date: '2023-07-05'
                },
                {
                    name: 'Emerald Cavern',
                    town: 'Ponce',
                    biodiversity: ['Guano', 'Reptilia', 'Fungi'],
                    size: '23.2 GB',
                    date: '2023-06-12'
                }
                ];

        
                var filteredCaves = caves.filter(function(cave) 
                {
                    return (name === '' || cave.name.toLowerCase().includes(name)) &&
                        (town === '' || cave.town === town) &&
                        (biodiversityFilters.length === 0 || biodiversityFilters.every(function(filter) {
                            return cave.biodiversity.includes(filter);
                        }));
                });
                displayCaves(filteredCaves);
            });

            function displayCaves(caves) {
                var table = document.getElementById('cavesTables');
                var tbody = table.querySelector('tbody');
                if (tbody) {
                    table.removeChild(tbody);
                }
                tbody = document.createElement('tbody');


                var row = tbody.insertRow();
                row.insertCell().appendChild(document.createTextNode("Cave Name"));
                row.insertCell().appendChild(document.createTextNode("Town"));
                row.insertCell().appendChild(document.createTextNode("Biodiversity"));
                row.insertCell().appendChild(document.createTextNode("Cave Size (3D Model)"));
                row.insertCell().appendChild(document.createTextNode("Date Created"));
                caves.forEach(function(cave) {
                    var row = tbody.insertRow();
                    var nameCell = row.insertCell();
                    nameCell.innerHTML = `<a href="edit-cave.html">${cave.name}</a>`;
                    row.insertCell().appendChild(document.createTextNode(cave.town));
                    row.insertCell().appendChild(document.createTextNode(cave.biodiversity.join(', ')));
                    row.insertCell().appendChild(document.createTextNode(cave.size));
                    row.insertCell().appendChild(document.createTextNode(cave.date));
                });

                table.appendChild(tbody);
            }
        });