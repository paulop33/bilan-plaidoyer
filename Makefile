generate:
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Ambarès-et-Lagrave.pdf" "https://localhost:8000/bilan/Ambarès-et-Lagrave"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Ambès.pdf" "https://localhost:8000/bilan/Ambès"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Artigues-près-Bordeaux.pdf" "https://localhost:8000/bilan/Artigues-près-Bordeaux"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Bassens.pdf" "https://localhost:8000/bilan/Bassens"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Bègles.pdf" "https://localhost:8000/bilan/Bègles"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Blanquefort.pdf" "https://localhost:8000/bilan/Blanquefort"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Bordeaux.pdf" "https://localhost:8000/bilan/Bordeaux"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Bouliac.pdf" "https://localhost:8000/bilan/Bouliac"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Bruges.pdf" "https://localhost:8000/bilan/Bruges"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Carbon-Blanc.pdf" "https://localhost:8000/bilan/Carbon-Blanc"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Cenon.pdf" "https://localhost:8000/bilan/Cenon"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Eysines.pdf" "https://localhost:8000/bilan/Eysines"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Floirac.pdf" "https://localhost:8000/bilan/Floirac"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Gradignan.pdf" "https://localhost:8000/bilan/Gradignan"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Le Bouscat.pdf" "https://localhost:8000/bilan/Le Bouscat"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Le Haillan.pdf" "https://localhost:8000/bilan/Le Haillan"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Le Taillan-Médoc.pdf" "https://localhost:8000/bilan/Le Taillan-Médoc"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Lormont.pdf" "https://localhost:8000/bilan/Lormont"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Martignas-sur-Jalle.pdf" "https://localhost:8000/bilan/Martignas-sur-Jalle"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Mérignac.pdf" "https://localhost:8000/bilan/Mérignac"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Parempuyre.pdf" "https://localhost:8000/bilan/Parempuyre"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Pessac.pdf" "https://localhost:8000/bilan/Pessac"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Saint-Aubin de Médoc.pdf" "https://localhost:8000/bilan/Saint-Aubin de Médoc"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Saint-Louis-de-Montferrand.pdf" "https://localhost:8000/bilan/Saint-Louis-de-Montferrand"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Saint-Médard-en-Jalles.pdf" "https://localhost:8000/bilan/Saint-Médard-en-Jalles"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Saint-Vincent-de-Paul.pdf" "https://localhost:8000/bilan/Saint-Vincent-de-Paul"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Talence.pdf" "https://localhost:8000/bilan/Talence"
	chromium --headless --ignore-certificate-errors --disable-gpu --no-sandbox --no-pdf-header-footer --print-to-pdf="generate-bilan/main/Villenave-d'Ornon.pdf" "https://localhost:8000/bilan/Villenave-d%27Ornon"

create-folder:
	mkdir -p "assets/cartes/Ambarès-et-Lagrave"
	#mv "assets/cartes/Ambare<0300>s-et-Lagrave*.png" "assets/cartes/Ambarès-et-Lagrave/"
	mkdir -p "assets/cartes/Ambès"
	#mv "assets/cartes/Ambès*.png" "assets/cartes/Ambès/"
	mkdir -p "assets/cartes/Artigues-près-Bordeaux"
	#mv "assets/cartes/Artigues-près-Bordeaux*.png" "assets/cartes/Artigues-près-Bordeaux/"
	mkdir -p "assets/cartes/Bassens"
	#mv "assets/cartes/Bassens*.png" "assets/cartes/Bassens/"
	#mkdir -p "assets/cartes/Bègles"
	#mv "assets/cartes/Bègles*.png" "assets/cartes/Bègles/"
#	mkdir -p "assets/cartes/Blanquefort"
#	mv assets/cartes/Blanquefort*.png "assets/cartes/Blanquefort/"
#	mkdir -p "assets/cartes/Bordeaux"
#	mv assets/cartes/Bordeaux*.png "assets/cartes/Bordeaux/"
#	mkdir -p "assets/cartes/Bouliac"
#	mv assets/cartes/Bouliac*.png "assets/cartes/Bouliac/"
#	mkdir -p "assets/cartes/Bruges"
#	mv assets/cartes/Bruges*.png "assets/cartes/Bruges/"
#	mkdir -p "assets/cartes/Carbon-Blanc"
#	mv assets/cartes/Carbon-Blanc*.png "assets/cartes/Carbon-Blanc/"
#	mkdir -p "assets/cartes/Cenon"
#	mv assets/cartes/Cenon*.png "assets/cartes/Cenon/"
#	mkdir -p "assets/cartes/Eysines"
#	mv assets/cartes/Eysines*.png "assets/cartes/Eysines/"
#	mkdir -p "assets/cartes/Floirac"
#	mv assets/cartes/Floirac*.png "assets/cartes/Floirac/"
#	mkdir -p "assets/cartes/Gradignan*.png"
#	mv assets/cartes/Gradignan*.png "assets/cartes/Gradignan.pd/"
	mkdir -p "assets/cartes/Le Bouscat"
	mv 'assets/cartes/Le Bouscat*.png' "assets/cartes/Le Bouscat/"
	mkdir -p "assets/cartes/Le Haillan"
	mv assets/cartes/Le Haillan*.png "assets/cartes/Le Haillan/"
	mkdir -p "assets/cartes/Le Taillan-Médoc"
	mv assets/cartes/Le Taillan-Médoc*.png "assets/cartes/Le Taillan-Médoc/"
	mkdir -p "assets/cartes/Lormont"
	mv assets/cartes/Lormont*.png "assets/cartes/Lormont/"
	mkdir -p "assets/cartes/Martignas-sur-Jalle"
	mv assets/cartes/Martignas-sur-Jalle*.png "assets/cartes/Martignas-sur-Jalle/"
	#mkdir -p "assets/cartes/Mérignac"
	#mv assets/cartes/Mérignac*.png "assets/cartes/Mérignac/"
	mkdir -p "assets/cartes/Parempuyre"
	mv assets/cartes/Parempuyre*.png "assets/cartes/Parempuyre/"
	mkdir -p "assets/cartes/Pessac"
	mv assets/cartes/Pessac*.png "assets/cartes/Pessac/"
	mkdir -p "assets/cartes/Saint-Aubin de Médoc"
	mv assets/cartes/Saint-Aubin de Médoc*.png "assets/cartes/Saint-Aubin de Médoc/"
	mkdir -p "assets/cartes/Saint-Louis-de-Montferrand"
	mv assets/cartes/Saint-Louis-de-Montferrand*.png "assets/cartes/Saint-Louis-de-Montferrand/"
	#mkdir -p "assets/cartes/Saint-Médard-en-Jalles"
	#mv assets/cartes/Saint-Médard-en-Jalles*.png "assets/cartes/Saint-Médard-en-Jalles/"
	mkdir -p "assets/cartes/Saint-Vincent-de-Paul"
	mv assets/cartes/Saint-Vincent-de-Paul*.png "assets/cartes/Saint-Vincent-de-Paul/"
	mkdir -p "assets/cartes/Talence"
	mv assets/cartes/Talence*.png "assets/cartes/Talence/"
	mkdir -p "assets/cartes/Villenave-d'Ornon"
	mv assets/cartes/Villenave-d'Ornon*.png "assets/cartes/Villenave-d'Ornon/"

nettoyage-fichier:
	for dir in assets/cartes/*/; do
	  for f in "$dir"*; do
		newname="${f##*/}"      # récupère le nom de fichier uniquement
		newname="${newname#*_}" # enlève tout avant le premier "_"
		mv -- "$f" "$dir$newname"
	  done
	done
