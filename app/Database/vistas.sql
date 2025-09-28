CREATE VIEW view_superhero_publisher AS
    SELECT
    PB.publisher_name,
    COUNT(SH.publisher_id) AS 'Total'
    FROM superhero SH
    LEFT JOIN publisher PB ON PB.id= SH.publisher_id
    WHERE PB.id IN(3,4,5,10,13)
    GROUP BY PB.publisher_name;

CREATE VIEW view_superhero_alignment AS
    SELECT 
    AL.alignment,
    COUNT(SH.alignment_id) AS 'Total'
    FROM superhero SH
    LEFT JOIN alignment AL ON AL.id= SH.alignment_id
    GROUP BY SH.alignment_id;

-- solo para guia al modelo
CREATE VIEW vista_gender_pdf AS
    SELECT
        SH.superhero_name,
        SH.full_name,
        GD.gender,
        AL.alignment,
        PB.publisher_name
    FROM superhero SH
    LEFT JOIN gender GD ON GD.id=SH.gender_id
    LEFT JOIN alignment AL ON AL.id=alignment_id
    LEFT JOIN publisher PB ON PB.id=publisher_id;