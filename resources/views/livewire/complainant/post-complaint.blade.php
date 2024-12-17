<div x-data="mapComponent(@js($allPuroks))" x-init="initMap()">
    <div class="grid 2xl:grid-cols-5 grid-cols-1 gap-5">
        <!-- Form Section -->
        <div class="2xl:col-span-2">
            <div class="border p-5 rounded-xl">
                <div>
                    {{ $this->form }}
                </div>
                <div class="mt-5">
                    <x-primary-button wire:click="submitComplaint">
                        Submit Complaint
                    </x-primary-button>
                </div>
            </div>
        </div>

        <!-- Map Section -->
        <div class="2xl:col-span-3">
            <div class="border p-2 h-[40rem] overflow-hidden rounded-xl" wire:ignore>
                <div id="map" class="w-full h-full"></div>
            </div>
            <div class="mt-2 w-96 p-3 rounded-lg border">
                <h1 class="font-semibold text-gray-600">Intensity Heat Map</h1>
                <div class="mt-5 space-y-2">
                    <div class="flex space-x-3 items-center">
                        <div class="h-10 w-10 bg-red-500/70 border-4 border-red-700 rounded-full">
                        </div>
                        <span>Complaints ^25</span>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <div class="h-10 w-10 bg-yellow-400/70 border-4 border-yellow-700 rounded-full">
                        </div>
                        <span>Complaints ^15</span>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <div class="h-10 w-10 bg-green-400/70 border-4 border-green-700 rounded-full">
                        </div>
                        <span>Complaints ^5</span>
                    </div>
                    <div class="flex space-x-3 items-center">
                        <div class="h-10 w-10 bg-gray-400/70 border-4 border-gray-500 rounded-full">
                        </div>
                        <span>Complaints 0</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        // function mapComponent(puroks) {
        //     return {
        //         map: null, // Leaflet map instance
        //         circles: [], // Store circle instances
        //         puroks, // Initial Puroks data
        //         selectedPurok: null, // Currently selected Purok
        //         bounds: null, // Bounds object to fit all circles

        //         initMap() {
        //             console.log("Initializing map...");
        //             console.log("Purok data received:", this.puroks);

        //             // Initialize the map
        //             this.map = L.map('map').setView([13.9394, 121.6142], 12);

        //             // Add tile layer
        //             L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        //                 maxZoom: 18,
        //                 attribution: '© OpenStreetMap contributors',
        //             }).addTo(this.map);

        //             // Add circles
        //             this.addCircles(this.puroks);

        //             // Listen for the purokSelected event from Livewire
        //             Livewire.on('purokSelected', (purokId) => {
        //                 this.centerMapOnPurok(purokId);
        //             });
        //         },

        //         // Function to determine circle color based on complaints count
        //         getCircleColor(complaintsCount) {
        //             if (complaintsCount >= 25) {
        //                 return 'red';
        //             } else if (complaintsCount >= 15) {
        //                 return 'yellow';
        //             } else if (complaintsCount >= 1) {
        //                 return 'green';
        //             } else {
        //                 return 'gray'; // Default color if no complaints
        //             }
        //         },

        //         addCircles(puroks) {
        //             console.log("Adding circles to map...");
        //             console.log("Circles Data:", puroks);

        //             // Remove existing circles
        //             this.circles.forEach(circle => this.map.removeLayer(circle));
        //             this.circles = [];

        //             // Initialize a bounds object
        //             this.bounds = L.latLngBounds();

        //             // Add new circles
        //             puroks.forEach(purok => {
        //                 if (purok.latitude && purok.longitude) {
        //                     console.log(
        //                         `Adding circle for: ${purok.name} at [${purok.latitude}, ${purok.longitude}]`);

        //                     // Get circle color based on complaints count
        //                     const circleColor = this.getCircleColor(purok.complaints_count);

        //                     // Create a circle (radius in meters, e.g., 100 meters radius)
        //                     const circle = L.circle([purok.latitude, purok.longitude], {
        //                             color: circleColor, // Circle color
        //                             fillColor: circleColor, // Fill color
        //                             fillOpacity: 0.5, // Fill opacity
        //                             radius: 100 // Radius in meters
        //                         })
        //                         .bindPopup(
        //                             `<strong>${purok.name}</strong><br>Complaints: ${purok.complaints_count}`)
        //                         .addTo(this.map);

        //                     // Add circle to the array
        //                     this.circles.push(circle);

        //                     // Extend the bounds to include this circle's location
        //                     this.bounds.extend([purok.latitude, purok.longitude]);
        //                 } else {
        //                     console.warn(`Invalid coordinates for Purok: ${purok.name}`);
        //                 }
        //             });

        //             // Fit the map to the bounds of all circles
        //             if (this.circles.length > 0) {
        //                 this.map.fitBounds(this.bounds);
        //             } else {
        //                 console.warn("No valid circles to center on.");
        //             }
        //         },

        //         centerMapOnPurok(purokId) {
        //             const selectedPurok = this.puroks.find(purok => purok.id === parseInt(purokId));

        //             // Remove the previous circle if it exists
        //             if (this.selectedPurok && this.selectedPurok !== selectedPurok) {
        //                 this.circles.forEach(circle => this.map.removeLayer(circle));
        //                 this.circles = [];
        //             }

        //             // Set the new selected Purok circle
        //             if (selectedPurok && selectedPurok.latitude && selectedPurok.longitude) {
        //                 console.log(`Centering map on Purok: ${selectedPurok.name}`);
        //                 this.map.setView([selectedPurok.latitude, selectedPurok.longitude], 17);

        //                 // Get the circle color based on complaints count
        //                 const circleColor = this.getCircleColor(selectedPurok.complaints_count);

        //                 // Add the circle for the selected Purok
        //                 const circle = L.circle([selectedPurok.latitude, selectedPurok.longitude], {
        //                         color: circleColor,
        //                         fillColor: circleColor,
        //                         fillOpacity: 0.5,
        //                         radius: 100
        //                     }).bindPopup(
        //                         `<strong>${selectedPurok.name}</strong><br>Complaints: ${selectedPurok.complaints_count}`)
        //                     .addTo(this.map);

        //                 // Store the circle
        //                 this.circles.push(circle);
        //             } else {
        //                 console.warn("Selected Purok has invalid coordinates.");
        //             }

        //             // Update the selected Purok
        //             this.selectedPurok = selectedPurok;
        //         },
        //     };
        // }
        function mapComponent(puroks) {
            return {
                map: null, // Leaflet map instance
                circles: [], // Store circle instances
                puroks, // Initial Puroks data
                selectedPurok: null, // Currently selected Purok
                bounds: null, // Bounds object to fit all circles
                geoJsonLayer: null, // Store GeoJSON layer

                initMap() {
                    console.log("Initializing map...");
                    console.log("Purok data received:", this.puroks);

                    // Initialize the map
                    this.map = L.map('map').setView([13.9394, 121.6142], 12);

                    // Add tile layer
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 18,
                        attribution: '© OpenStreetMap contributors',
                    }).addTo(this.map);

                    // Add circles
                    this.addCircles(this.puroks);

                    // Load GeoJSON file
                    this.loadGeoJSON('{{ asset('file/lucena.geoJSON') }}'); // <-- Replace with actual GeoJSON file path

                    // Listen for the purokSelected event from Livewire
                    Livewire.on('purokSelected', (purokId) => {
                        this.centerMapOnPurok(purokId);
                    });
                },

                loadGeoJSON(geoJsonPath) {
                    console.log("Loading GeoJSON...");

                    fetch(geoJsonPath)
                        .then(response => response.json())
                        .then(data => {
                            console.log("GeoJSON data loaded:", data);

                            // Add GeoJSON layer
                            this.geoJsonLayer = L.geoJSON(data, {
                                style: feature => ({
                                    color: feature.properties.color || 'blue', // Default color
                                    weight: 1,
                                    fillOpacity: 0.2
                                }),
                                onEachFeature: (feature, layer) => {
                                    if (feature.properties && feature.properties.name) {
                                        layer.bindPopup(`<strong>${feature.properties.name}</strong>`);
                                    }
                                }
                            }).addTo(this.map);

                            // Adjust map bounds to fit GeoJSON data
                            this.map.fitBounds(this.geoJsonLayer.getBounds());
                        })
                        .catch(error => console.error("Error loading GeoJSON:", error));
                },

                // Function to determine circle color based on complaints count
                getCircleColor(complaintsCount) {
                    if (complaintsCount >= 25) {
                        return 'red';
                    } else if (complaintsCount >= 15) {
                        return 'yellow';
                    } else if (complaintsCount >= 1) {
                        return 'green';
                    } else {
                        return 'gray'; // Default color if no complaints
                    }
                },

                addCircles(puroks) {
                    console.log("Adding circles to map...");
                    console.log("Circles Data:", puroks);

                    // Remove existing circles
                    this.circles.forEach(circle => this.map.removeLayer(circle));
                    this.circles = [];

                    // Initialize a bounds object
                    this.bounds = L.latLngBounds();

                    // Add new circles
                    puroks.forEach(purok => {
                        if (purok.latitude && purok.longitude) {
                            console.log(
                                `Adding circle for: ${purok.name} at [${purok.latitude}, ${purok.longitude}]`
                            );

                            // Get circle color based on complaints count
                            const circleColor = this.getCircleColor(purok.complaints_count);

                            // Create a circle (radius in meters, e.g., 100 meters radius)
                            const circle = L.circle([purok.latitude, purok.longitude], {
                                    color: circleColor,
                                    fillColor: circleColor,
                                    fillOpacity: 0.5,
                                    radius: 100
                                })
                                .bindPopup(
                                    `<strong>${purok.name}</strong><br>Complaints: ${purok.complaints_count}`
                                )
                                .addTo(this.map);

                            // Add circle to the array
                            this.circles.push(circle);

                            // Extend the bounds to include this circle's location
                            this.bounds.extend([purok.latitude, purok.longitude]);
                        } else {
                            console.warn(`Invalid coordinates for Purok: ${purok.name}`);
                        }
                    });

                    // Fit the map to the bounds of all circles
                    if (this.circles.length > 0) {
                        this.map.fitBounds(this.bounds);
                    } else {
                        console.warn("No valid circles to center on.");
                    }
                },

                centerMapOnPurok(purokId) {
                    const selectedPurok = this.puroks.find(purok => purok.id === parseInt(purokId));

                    // Remove the previous circle if it exists
                    if (this.selectedPurok && this.selectedPurok !== selectedPurok) {
                        this.circles.forEach(circle => this.map.removeLayer(circle));
                        this.circles = [];
                    }

                    // Set the new selected Purok circle
                    if (selectedPurok && selectedPurok.latitude && selectedPurok.longitude) {
                        console.log(`Centering map on Purok: ${selectedPurok.name}`);
                        this.map.setView([selectedPurok.latitude, selectedPurok.longitude], 17);

                        // Get the circle color based on complaints count
                        const circleColor = this.getCircleColor(selectedPurok.complaints_count);

                        // Add the circle for the selected Purok
                        const circle = L.circle([selectedPurok.latitude, selectedPurok.longitude], {
                                color: circleColor,
                                fillColor: circleColor,
                                fillOpacity: 0.5,
                                radius: 100
                            }).bindPopup(
                                `<strong>${selectedPurok.name}</strong><br>Complaints: ${selectedPurok.complaints_count}`
                            )
                            .addTo(this.map);

                        // Store the circle
                        this.circles.push(circle);
                    } else {
                        console.warn("Selected Purok has invalid coordinates.");
                    }

                    // Update the selected Purok
                    this.selectedPurok = selectedPurok;
                },
            };
        }
    </script>
</div>
