printf "==== MCI JavaScript Dependency Manager ====\n";
printf "# Cloning dependencies =>\n\n\n";


printf "## Cloning Leaflet.heat from https://github.com/Leaflet/Leaflet.heat ...\n";
git clone https://github.com/Leaflet/Leaflet.heat public/static/js/Leaflet.heat &> /dev/null
printf "## Success. Setup for Leaflet.heat done.\n\n";


printf "\n# Done, all dependencies set.\n";
printf "==== Exiting ====\n";
