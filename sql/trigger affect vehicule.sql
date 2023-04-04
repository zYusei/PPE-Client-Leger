DROP TRIGGER IF EXISTS AFFECTATION_VEHICULE ; 

DELIMITER $

CREATE TRIGGER AFFECTATION_VEHICULE AFTER INSERT ON 
PLANNING FOR EACH ROW BEGIN 
	declare idvehicule,
	x int;
	
	select count(*) into x
	from planning
	where
	    id_e = new.id_e
	    and id_cc != new.id_cc;
	
	if x > 0 then
	select id_v into idvehicule
	from
	    cours_conduite c,
	    planning p
	where
	    p.id_cc = c.id_cc
	    and datehf = (
	        select min(datehf)
	        from planning
	        where
	            id_e = new.id_e
	            and id_cc != new.id_cc
	    );
	
	ELSE
	select id_v into idvehicule
	from vehicule
	order by RAND()
	limit 1;
	
	END IF;
	
	IF idvehicule in (
	    select id_v
	    from
	        cours_conduite c,
	        planning p
	    where
	        c.id_cc = p.id_cc
	        and c.id_cc != new.id_cc
	        and (
	            new.datehd >= datehd
	            and new.datehd <= datehf
	            or new.datehf >= datehd
	            and new.datehf <= datehf
	        )
	) then (
	    select
	        id_v into idvehicule
	    from vehicule
	    where id_v not in (
	            select id_v
	            from
	                cours_conduite c,
	                planning p
	            where
	                c.id_cc = p.id_cc
	                and c.id_cc != new.id_cc
	                and (
	                    new.datehd >= datehd
	                    and new.datehd <= datehf
	                    or new.datehf >= datehd
	                    and new.datehf <= datehf
	                )
	        )
	    order by RAND()
	    limit 1
	);
	
	END IF;
	
	update cours_conduite
	set id_v = idvehicule
	where id_cc = new.id_cc;
	
	END
$ 

DELIMITER ;

DROP TRIGGER IF EXISTS AFFECTATION_MONITEUR ; 

DELIMITER $

CREATE TRIGGER AFFECTATION_MONITEUR BEFORE INSERT ON 
PLANNING FOR EACH ROW BEGIN 
	DECLARE id_moniteur INT;
	
	SELECT id_m INTO id_moniteur
	FROM planning
	WHERE id_e = NEW.id_e
	ORDER BY datehd ASC
	LIMIT 1;
	
	IF id_moniteur IS NULL THEN
	SELECT id_u INTO id_moniteur
	FROM USER
	WHERE
	    role_u = 'moniteur'
	    AND id_u NOT IN (
	        SELECT id_m
	        FROM planning
	    )
	LIMIT 1;
	
	END IF;
	
	IF id_moniteur IS NULL THEN
	SELECT id_m INTO id_moniteur
	FROM (
	        SELECT
	            id_m,
	            COUNT(*) AS nb_heures
	        FROM planning
	        GROUP BY id_m
	        ORDER BY
	            nb_heures ASC
	    ) AS t
	LIMIT 1;
	
	END IF;
	
	SET NEW.id_m = id_moniteur;
	
	END
$ 

DELIMITER ;