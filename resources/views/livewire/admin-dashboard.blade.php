<div>
    <div class="grid grid-cols-4 gap-5">
        @foreach ($puroks as $item)
            <div class="border py-3 px-5 rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-lg font-semibold text-gray-700">{{ $item->name }}</h1>
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-trending-up-down text-green-500">
                        <path d="M14.828 14.828 21 21" />
                        <path d="M21 16v5h-5" />
                        <path d="m21 3-9 9-4-4-6 6" />
                        <path d="M21 8V3h-5" />
                    </svg>
                </div>
                <div class="mt-2">
                    <p class="text-3xl font-semibold text-green-600">{{ $item->complaints_count ?? 0 }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="grid mt-10 grid-cols-5 gap-5">
        <div class="col-span-4">
            <div class=" border rounded-xl p-5 " x-data="mapComponent(@js($allPuroks))" x-init="initMap()">
                <div class="">
                    <div class="border p-2 h-[40rem] overflow-hidden rounded-xl" wire:ignore>
                        <div id="map" class="w-full h-full"></div>
                    </div>

                </div>
                <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
                <script>
                    function mapComponent(puroks) {
                        return {
                            map: null, // Leaflet map instance
                            circles: [], // Store circle instances
                            puroks, // Initial Puroks data
                            selectedPurok: null, // Currently selected Purok
                            bounds: null, // Bounds object to fit all circles

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

                                // Listen for the purokSelected event from Livewire
                                Livewire.on('purokSelected', (purokId) => {
                                    this.centerMapOnPurok(purokId);
                                });
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
                                            `Adding circle for: ${purok.name} at [${purok.latitude}, ${purok.longitude}]`);

                                        // Get circle color based on complaints count
                                        const circleColor = this.getCircleColor(purok.complaints_count);

                                        // Create a circle (radius in meters, e.g., 100 meters radius)
                                        const circle = L.circle([purok.latitude, purok.longitude], {
                                                color: circleColor, // Circle color
                                                fillColor: circleColor, // Fill color
                                                fillOpacity: 0.5, // Fill opacity
                                                radius: 100 // Radius in meters
                                            })
                                            .bindPopup(
                                                `<strong>${purok.name}</strong><br>Complaints: ${purok.complaints_count}`)
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
                                            `<strong>${selectedPurok.name}</strong><br>Complaints: ${selectedPurok.complaints_count}`)
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
        </div>
        <div>
            <div class=" p-3 rounded-lg border">
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
</div>
