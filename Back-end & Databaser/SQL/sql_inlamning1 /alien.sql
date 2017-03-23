

-- Hur många av olika rang.
SELECT COUNT(*), rank from crew group by rank;

-- Hur många som tillhör olika typer av avdelningar.
SELECT COUNT(*), dept FROM crew group by dept;

-- Kunna söka på för en viss rang?
SELECT * FROM crew WHERE (rank = '***');

-- Lista alla som tjänar mer än en viss (valfri) summa.
SELECT * from crew inner JOIN rank on crew.rank = rank.rank_id WHERE (rank.salary > 18000);

-- Lista antal utav hela besättningen.
SELECT COUNT(*), crew_id FROM crew;

-- Hur många är listade som avlidna.
SELECT COUNT(*), status from crew WHERE (status = 0);