--CREATE DATABASE

CREATE DATABASE medfind
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'English_United States.1252'
    LC_CTYPE = 'English_United States.1252'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;
	
-- USERS TABLE
CREATE TABLE IF NOT EXISTS users
(
    id serial PRIMARY KEY,
    name character varying(255) NOT NULL,
    email character varying(255)  NOT NULL,
    password character varying(255)  NOT NULL,
    pharmacy integer,
    CONSTRAINT fk_pharmacy FOREIGN KEY (pharmacy)
        REFERENCES pharmacy_details (pharm_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

--PHARMACY TABLE
CREATE TABLE IF NOT EXISTS pharmacy_details
(
    pharm_id serial PRIMARY KEY,
    pharm_name character varying(255)  DEFAULT NULL,
    pharm_address character varying(255)  DEFAULT NULL,
    pharm_no character varying(255)  DEFAULT NULL,
    pharm_email character varying(255)  DEFAULT NULL,
    pharm_open time without time zone,
    pharm_close time without time zone,
    cover character varying(100)  DEFAULT NULL,
    map character varying(255)  NOT NULL,
    direction character varying(255)  NOT NULL
)

TABLESPACE pg_default;

--PACKAGING TABLE
CREATE TABLE IF NOT EXISTS packaging
(
    pack_id serial PRIMARY KEY,
    pack_name character varying(255) NOT NULL
)

TABLESPACE pg_default;

--CLASSIFICATION TABLE
CREATE TABLE IF NOT EXISTS classification
(
    class_id serial PRIMARY KEY,
    class_name character varying(255) NOT NULL
)

TABLESPACE pg_default;


--MEDICINE TABLE
CREATE TABLE IF NOT EXISTS public.medicine
(
    med_id serial PRIMARY KEY,
    med_name character varying(100)  DEFAULT NULL,
    med_pack integer,
    med_dosage character varying(50)  DEFAULT NULL,
    med_class integer,
    images character varying(255)  NOT NULL,
    med_desc character varying(255)  NOT NULL,
    CONSTRAINT fk_class FOREIGN KEY (med_class)
        REFERENCES classification (class_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    CONSTRAINT fk_packaging FOREIGN KEY (med_pack)
        REFERENCES packaging (pack_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE NO ACTION
)

TABLESPACE pg_default;

--MED_PHARM TABLE
CREATE TABLE IF NOT EXISTS med_pharm
(
    med_pharm_id serial PRIMARY KEY,
    med_name integer,
    med_quan integer,
    med_price numeric(10,2) DEFAULT NULL,
    med_stat character varying(50)  DEFAULT NULL,
    med_added date,
    med_exp date,
    pharmacy integer,
    CONSTRAINT fk_med FOREIGN KEY (med_name)
        REFERENCES medicine (med_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE,
    CONSTRAINT fk_pharmacy FOREIGN KEY (pharmacy)
        REFERENCES pharmacy_details (pharm_id) MATCH SIMPLE
        ON UPDATE NO ACTION
        ON DELETE CASCADE
)

TABLESPACE pg_default;

--FUNCTIONS--FUNCTIONS--FUNCTIONS--FUNCTIONS--FUNCTIONS
--MAG GET SA MED_ID PARA MA INSERT SA MED_NAME SA MED_PHARM
CREATE OR REPLACE FUNCTION public.add_med(
	mdcn_name character varying,
	mdcn_pack integer,
	mdcn_dosage character varying,
	mdcn_class integer)
    RETURNS TABLE(mdcn_id integer) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
Begin
return query
Select med_id from medicine where
med_name = mdcn_name AND
med_pack = mdcn_pack AND
med_dosage = mdcn_dosage AND
med_class = mdcn_class;
END;
$BODY$;

--MAG GET SA CLASS INFO PARA E DISPLAY SA EDIT CLASS NA PAGE/FORM
CREATE OR REPLACE FUNCTION public.edit_class(
	p_id integer)
    RETURNS TABLE(clsn_id integer, clsn_name character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			class_id,
			class_name
		from
			classification
		where
			class_id = p_id;
end;
$BODY$;

--MAG GET SA users INFO PARA E DISPLAY SA EDIT CLASS NA PAGE/FORM
CREATE OR REPLACE FUNCTION public.edit_user(
	u_id integer)
    RETURNS TABLE(usrs_id integer, usrs_name character varying, usrs_email character varying, usrs_password character varying, usrs_pharmacy character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			users.id,
			users.name,
			users.email,
			users.password,
			pharmacy_details.pharm_name
		from
			users
		inner join pharmacy_details on users.pharmacy = pharmacy_details.pharm_id
		where
			id = u_id;
end;
$BODY$;

--MAG GET SA MEDICINE INFO SA MED_PHARM NA TABLE PARA E DISPLAY SA EDIT PAGE/FORM
CREATE OR REPLACE FUNCTION public.edit_med(
	m_id integer)
    RETURNS TABLE(edm_id integer, edm_name character varying, edm_quan integer, edm_price numeric, edm_exp date) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
		  	med_pharm.med_quan,
			med_pharm.med_price,
			med_pharm.med_exp
		from
			med_pharm
		inner join medicine ON medicine.med_id = med_pharm.med_name
		where
			med_pharm_id = m_id;
end;
$BODY$;

--MAG GET SA MEDICINE INFO SA MEDICINE NA TABLE PARA E DISPLAY SA EDIT PAGE/FORM
CREATE OR REPLACE FUNCTION public.edit_medicine(
	m_id integer)
    RETURNS TABLE(edm_id integer, edm_name character varying, edm_pack character varying, edm_dosage character varying, edm_class character varying, edm_images character varying, edm_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			medicine.med_id,
		  	medicine.med_name,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
		  	medicine.images,
		  	medicine.med_desc
		from
			medicine
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		where
			med_id = m_id;
end;
$BODY$;

--MAG GET SA pharm_details PARA E DISPLAY SA EDIT PAGE/FORM
CREATE OR REPLACE FUNCTION public.edit_pharmacy(
	p_id integer)
    RETURNS TABLE(dtls_id integer, dtls_name character varying, dtls_address character varying, dtls_no character varying, dtls_email character varying, dtls_open time without time zone, dtls_close time without time zone, dtls_cover character varying, dtls_map character varying, dtls_direction character varying ) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			pharm_name,
		  	pharm_address,
		  	pharm_no,
		  	pharm_email,
		  	pharm_open,
		  	pharm_close,
			cover,
			map,
			direction
		from
			pharmacy_details
		where
			pharm_id = p_id;
end;
$BODY$;


--MAG GET SA PACK INFO PARA E DISPLAY SA EDIT PAGE/FORM
CREATE OR REPLACE FUNCTION public.edit_packaging(
	p_id integer)
    RETURNS TABLE(pckg_id integer, pckg_name character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			pack_id,
			pack_name
		from
			packaging
		where
			pack_id = p_id;
end;
$BODY$;

--MAG GET SA AVAILABLE MEDICINES
CREATE OR REPLACE FUNCTION public.get_available(
	p_id integer)
    RETURNS TABLE(exp_id integer, exp_name character varying, exp_quan integer, exp_price numeric, exp_pack character varying, exp_dosage character varying, exp_class character varying, exp_stat character varying, exp_added date, exp_exp date, exp_pharmacy character varying, exp_images character varying, exp_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
		  	med_pharm.med_quan,
		  	med_pharm.med_price,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
		  	med_pharm.med_stat,
		  	med_pharm.med_added,
		  	med_pharm.med_exp,
		  	pharmacy_details.pharm_name,
		  	medicine.images,
		  	medicine.med_desc
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		inner join pharmacy_details ON pharmacy_details.pharm_id = med_pharm.pharmacy
		where
			pharmacy = p_id AND
			med_stat = 'Available'
			order by med_name asc;
end;
$BODY$;

--MAG GET SA CLASSIFICATIONS
CREATE OR REPLACE FUNCTION public.get_classification(
	)
    RETURNS TABLE(clsn_id integer, clsn_name character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			class_id,
			class_name
		from
			classification
		order by class_name asc;
end;
$BODY$;

--MAG GET SA EXPIRED MEDS
CREATE OR REPLACE FUNCTION public.get_expired(
	p_id integer)
    RETURNS TABLE(exp_id integer, exp_name character varying, exp_quan integer, exp_price numeric, exp_pack character varying, exp_dosage character varying, exp_class character varying, exp_stat character varying, exp_added date, exp_exp date, exp_pharmacy character varying, exp_images character varying, exp_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
		  	med_pharm.med_quan,
		  	med_pharm.med_price,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
		  	med_pharm.med_stat,
		  	med_pharm.med_added,
		  	med_pharm.med_exp,
		  	pharmacy_details.pharm_name,
		  	medicine.images,
		  	medicine.med_desc
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		inner join pharmacy_details ON pharmacy_details.pharm_id = med_pharm.pharmacy
		where
			pharmacy = p_id AND
			med_exp < now()
			order by med_name asc;
end;
$BODY$;

--MAG GET SA MEDS FOR SUPERUSER VIEW
CREATE OR REPLACE FUNCTION public.get_medicine(
	med_pharm integer)
    RETURNS TABLE(mdcn_id integer, mdcn_name character varying, mdcn_quan integer, mdc_price integer, mdcn_pack character varying, mdcn_dosage character varying, mdcn_class character varying, mdcn_stat character varying, mdcn_added date, mdcn_exp date, pharmacy integer, mdcn_images character varying, mdcn_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
			med_pharm.med_quan,
			med_pharm.med_price,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
			med_pharm.med_stat,
			med_pharm.med_added,
			med_pharm.med_exp,
		  	medicine.images,
		  	medicine.med_desc
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		where
			pharmacy = med_pharm
			order by med_name asc;
end;
$BODY$;


--MAG GET SA MED FOR ADMIN VIEW
CREATE OR REPLACE FUNCTION public.get_medpharm(
	m_id integer)
    RETURNS TABLE(mdcn_id integer, mdcn_name character varying, mdcn_quan integer, mdcn_price numeric, mdcn_pack character varying, mdcn_dosage character varying, mdcn_class character varying, mdcn_stat character varying, mdcn_added date, mdcn_exp date, mdcn_images character varying, mdcn_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
			med_pharm.med_quan,
			med_pharm.med_price,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
			med_pharm.med_stat,
			med_pharm.med_added,
			med_pharm.med_exp,
		  	medicine.images,
		  	medicine.med_desc
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		where pharmacy = m_id
		order by med_name asc;
end;
$BODY$;

--MAG GET SA PACKAGING
CREATE OR REPLACE FUNCTION public.get_packaging(
	)
    RETURNS TABLE(pckg_id integer, pckg_name character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			pack_id,
			pack_name
		from
			packaging
		order by pack_name ASC;
end;
$BODY$;

--MAG GET SA PHARMACY DETAILS
CREATE OR REPLACE FUNCTION public.get_pharmacy()
    RETURNS TABLE(dtls_id integer, dtls_name character varying, dtls_address character varying, dtls_no character varying, dtls_email character varying, dtls_open time without time zone, dtls_close time without time zone, dtls_cover character varying, dtls_map character varying, dtls_direction character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			pharm_id,
  			pharm_name,
		  	pharm_address,
		  	pharm_no,
		  	pharm_email,
		  	pharm_open,
		  	pharm_close,
		  	cover,
		  	map,
		  	direction
		from
			pharmacy_details
		where pharm_name NOT LIKE 'Super Admin'
		order by pharm_name ASC;
end;
$BODY$;

--MAG GET SA PHARMACY DETAILS
CREATE OR REPLACE FUNCTION public.get_pharmacy(
	pharmacy_pattern integer)
    RETURNS TABLE(dtls_id integer, dtls_name character varying, dtls_address character varying, dtls_no character varying, dtls_email character varying, dtls_open time without time zone, dtls_close time without time zone, dtls_cover character varying, dtls_map character varying, dtls_direction character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			pharm_id,
  			pharm_name,
		  	pharm_address,
		  	pharm_no,
		  	pharm_email,
		  	pharm_open,
		  	pharm_close,
		  	cover,
		  	map,
		  	direction
		from
			pharmacy_details
		where
			pharm_id = pharmacy_pattern;
end;
$BODY$;

--MAG GET SA USERS
CREATE OR REPLACE FUNCTION public.get_users()
    RETURNS TABLE(usrs_id integer, usrs_name character varying, usrs_email character varying, usrs_password character varying, usrs_pharmacy character varying)
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			users.id,
  			users.name,
		  	users.email,
		  	users.password,
		  	pharmacy_details.pharm_name
		from
			users
		inner join pharmacy_details on users.pharmacy = pharmacy_details.pharm_id
		where name NOT LIKE 'Super Admin'
		order by name asc;
end;
$BODY$;

--MAG GET SA MGA OUT OF STOCK OR NOT AVAILABLE NA MEDS
CREATE OR REPLACE FUNCTION public.get_stock(
	p_id integer)
    RETURNS TABLE(exp_id integer, exp_name character varying, exp_quan integer, exp_price numeric, exp_pack character varying, exp_dosage character varying, exp_class character varying, exp_stat character varying, exp_added date, exp_exp date, exp_pharmacy character varying, exp_images character varying, exp_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
		  	med_pharm.med_quan,
		  	med_pharm.med_price,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
		  	med_pharm.med_stat,
		  	med_pharm.med_added,
		  	med_pharm.med_exp,
		  	pharmacy_details.pharm_name,
		  	medicine.images,
		  	medicine.med_desc
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		inner join pharmacy_details ON pharmacy_details.pharm_id = med_pharm.pharmacy
		where
			pharmacy = p_id AND
			med_stat = 'Not Available'
			order by med_name asc;
end;
$BODY$;

--PARA SA MED DISPLAY SA CONSUMER SIDE
CREATE OR REPLACE FUNCTION public.index_view(
	p_id integer)
    RETURNS TABLE(iv_id integer, iv_name character varying, iv_quan integer, iv_price numeric, iv_pack character varying, iv_direction character varying, iv_images character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			med_pharm.med_pharm_id,
		  	medicine.med_name,
		  	med_pharm.med_quan,
		  	med_pharm.med_price,
		  	packaging.pack_name,
		  	pharmacy_details.direction,
		  	medicine.images
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join pharmacy_details ON pharmacy_details.pharm_id = med_pharm.pharmacy
		where
			pharmacy = p_id;
end;
$BODY$;

--VIEW SA SEARCH RESULTS
CREATE OR REPLACE FUNCTION public.result_view(
	search_query character varying)
    RETURNS TABLE(sq_id integer, sq_name character varying, sq_price numeric, sq_quan integer, sq_pack character varying, sq_dosage character varying, sq_images character varying, sq_pharmname character varying, sq_pharmaddress character varying, sq_pharmno character varying, sq_pharmemail character varying, sq_pharmopen time without time zone, sq_pharmclose time without time zone, sq_pharmdirection character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		SELECT 
		med_pharm.med_pharm_id, 
		medicine.med_name, 
		med_pharm.med_price, 
		med_pharm.med_quan,
		packaging.pack_name,
		medicine.med_dosage, 
		medicine.images, 
		pharmacy_details.pharm_name, 
		pharmacy_details.pharm_address, 
		pharmacy_details.pharm_no, 
		pharmacy_details.pharm_email, 
		pharmacy_details.pharm_open, 
		pharmacy_details.pharm_close, 
		pharmacy_details.direction 
		from
			med_pharm
		inner join medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join pharmacy_details ON pharmacy_details.pharm_id = med_pharm.pharmacy
		where
			medicine.med_name ilike search_query or medicine.med_desc ilike search_query
			order by pack_name, med_price asc;
end;
$BODY$;

--PARA SA VIEW IF MAG SELECT NA SI CONSUMER UG MEDS
CREATE OR REPLACE FUNCTION public.result_select(
	m_id integer)
    RETURNS TABLE(sq_id integer, sq_name character varying, sq_price numeric, sq_quan integer, sq_pack character varying, sq_dosage character varying, sq_images character varying, sq_pharid integer, sq_pharmname character varying, sq_pharmaddress character varying, sq_pharmno character varying, sq_pharmemail character varying, sq_pharmopen time without time zone, sq_pharmclose time without time zone, sq_pharmmap character varying, sq_pharmdirection character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		SELECT 
		med_pharm.med_pharm_id, 
		medicine.med_name, 
		med_pharm.med_price, 
		med_pharm.med_quan,
		packaging.pack_name,
		medicine.med_dosage, 
		medicine.images, 
		pharmacy_details.pharm_id,
		pharmacy_details.pharm_name, 
		pharmacy_details.pharm_address, 
		pharmacy_details.pharm_no, 
		pharmacy_details.pharm_email, 
		pharmacy_details.pharm_open, 
		pharmacy_details.pharm_close,
		pharmacy_details.map,
		pharmacy_details.direction 
		from
			med_pharm
		inner join  medicine on medicine.med_id = med_pharm.med_name
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join pharmacy_details ON pharmacy_details.pharm_id = med_pharm.pharmacy
		where
			med_pharm_id = m_id;
end; 
$BODY$;

--PROCEDURES--PROCEDURES--PROCEDURES--PROCEDURES--PROCEDURES--PROCEDURES
--MAG ADD CLASS
CREATE OR REPLACE PROCEDURE public.add_classification(
	IN clsn_name character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   INSERT INTO classification(class_name)
   VALUES(clsn_name);
END;
$BODY$;

--MAG ADD PACKAGING
CREATE OR REPLACE PROCEDURE public.add_packaging(
	IN pckg_name character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   INSERT INTO packaging(pack_name)
   VALUES(pckg_name);

END;
$BODY$;

---MAG ADD PHARMACY FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.add_pharmacy(
    IN dtls_name character varying,
    IN dtls_address character varying,
    IN dtls_no character varying,
    IN dtls_email character varying,
    IN dtls_open time without time zone,
    IN dtls_close time without time zone,
    IN dtls_cover character varying,
    IN dtls_map character varying,
    IN dtls_direction character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   INSERT INTO pharmacy_details (pharm_name, pharm_address, pharm_no, pharm_email, pharm_open, pharm_close, cover, map, direction)
   VALUES(dtls_name, dtls_address, dtls_no, dtls_email, dtls_open, dtls_close, dtls_cover, dtls_map, dtls_direction);
END;
$BODY$;


--MAG ADD USERS FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.add_users(
	IN user_name character varying,
	IN user_email character varying,
	IN user_password character varying,
	IN user_pharmacy integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   INSERT INTO users (name, email, password, pharmacy)
   VALUES(user_name, user_email, user_password, user_pharmacy);
END;
$BODY$;


--MAG ADD MED FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.add_medicine(
	IN mdcn_name character varying,
	IN mdcn_pack integer,
	IN mdcn_dosage character varying,
	IN mdcn_class integer,
	IN mdcn_images character varying,
	IN mdcn_desc character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   INSERT INTO medicine(med_name, med_pack, med_dosage, med_class, images, med_desc)
   VALUES(mdcn_name, mdcn_pack, mdcn_dosage, mdcn_class, mdcn_images, mdcn_desc);
END;
$BODY$;

--ADJUST QUANTITY
CREATE OR REPLACE PROCEDURE public.adjust_quan(
	IN mdcn_id integer,
	IN mdcn_stat character varying,
	IN mdcn_quan integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE med_pharm SET med_quan = mdcn_quan, med_stat = mdcn_stat
   WHERE med_pharm_id = mdcn_id;

END;
$BODY$;

--REMOVE CLASS
CREATE OR REPLACE PROCEDURE public.remove_classification(
	IN clsn_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   DELETE FROM classification
   WHERE class_id = clsn_id;

END;
$BODY$;

--REMOVE MED FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.remove_medicine(
	IN mdcn_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   DELETE FROM medicine
   WHERE med_id = mdcn_id;

END;
$BODY$;

--REMOVE pharm FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.remove_pharmacy(
	IN dtls_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   DELETE FROM pharmacy_details
   WHERE pharm_id = dtls_id;

END;
$BODY$;

--REMOVE user FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.remove_user(
	IN usrs_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   DELETE FROM users
   WHERE id = usrs_id;

END;
$BODY$;

--REMOVE MED FOR ADMIN
CREATE OR REPLACE PROCEDURE public.remove_medpharm(
	IN mdcn_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   DELETE FROM med_pharm
   WHERE med_pharm_id = mdcn_id;

END;
$BODY$;

--REMOVE PACKAGING
CREATE OR REPLACE PROCEDURE public.remove_packaging(
	IN pckg_id integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   DELETE FROM packaging
   WHERE pack_id = pckg_id;
END;
$BODY$;

--UPDATE CLASS
CREATE OR REPLACE PROCEDURE public.update_classification(
	IN clsn_id integer,
	IN clsn_name character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE classification SET class_name = clsn_name
   WHERE class_id = clsn_id;

END;
$BODY$;

--UPDATE MED FOR SUPERUSER
CREATE OR REPLACE PROCEDURE public.update_medicine(
	IN mdcn_id integer,
	IN mdcn_name varchar,
	IN mdcn_pack int,
	IN mdcn_dosage varchar,
	IN mdcn_class int)
LANGUAGE 'plpgsql'
AS $$
BEGIN
   if mdcn_pack isnull then
   UPDATE medicine SET 
   med_name = mdcn_name,
   med_dosage = mdcn_dosage,
   med_class = mdcn_class
   WHERE med_id = mdcn_id;
   end if;
   
   if mdcn_class isnull then
   UPDATE medicine SET 
   med_name = mdcn_name,
   med_pack = mdcn_pack,
   med_dosage = mdcn_dosage
   WHERE med_id = mdcn_id;
   end if;
   
   if mdcn_pack is not null and mdcn_class is not null then
   UPDATE medicine SET 
   med_name = mdcn_name,
   med_pack = mdcn_pack,
   med_dosage = mdcn_dosage,
   med_class = mdcn_class
   WHERE med_id = mdcn_id;
   END IF;
   END $$;
   
  --if pack and class are null
  CREATE OR REPLACE PROCEDURE public.update_null(
	IN mdcn_id integer,
	IN mdcn_name varchar,
	IN mdcn_dosage varchar)
LANGUAGE 'plpgsql'
AS $$
BEGIN
   UPDATE medicine SET 
   med_name = mdcn_name,
   med_dosage = mdcn_dosage
   WHERE med_id = mdcn_id;
   END $$;

--UPDATE MED FOR ADMIN
CREATE OR REPLACE PROCEDURE public.update_pharmacy(
	IN dtls_id integer,
	IN dtls_name character varying,
    IN dtls_address character varying,
    IN dtls_no character varying,
    IN dtls_email character varying,
    IN dtls_open time without time zone,
    IN dtls_close time without time zone,
	IN dtls_cover character varying,
	IN dtls_map character varying,
	IN dtls_direction character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE pharmacy_details SET 
   pharm_name = dtls_name,
   pharm_address = dtls_address,
   pharm_no = dtls_no,
   pharm_email = dtls_email,
   pharm_open = dtls_open,
   pharm_close = dtls_close,
   cover = dtls_cover,
   map = dtls_map,
   direction = dtls_direction
   WHERE pharm_id = dtls_id;
END;
$BODY$;

--UPDATE PACKAGING
CREATE OR REPLACE PROCEDURE public.update_packaging(
	IN pckg_id integer,
	IN pckg_name character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE packaging SET pack_name = pckg_name
   WHERE pack_id = pckg_id;
END;
$BODY$;


--UPDATE users
CREATE OR REPLACE PROCEDURE public.update_users(
	IN usrs_id integer,
	IN usrs_name character varying,
	IN usrs_email character varying,
	IN usrs_password character varying,
	IN usrs_pharmacy integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE users SET 
   name = usrs_name,
   email = usrs_email,
   password = usrs_password,
   pharmacy = usrs_pharmacy
   WHERE id = usrs_id;
END;
$BODY$;

--UPLOAD PHARM PROFILE
CREATE OR REPLACE PROCEDURE public.upload(
	IN phm_id integer,
	IN phm_cover character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE pharmacy_details SET cover = phm_cover
   WHERE pharm_id = phm_id;

END;
$BODY$;

--UPLOAD MED PIC
CREATE OR REPLACE PROCEDURE public.upload_image(
	IN mdcn_id integer,
	IN mdcn_image character varying)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   UPDATE medicine SET images = mdcn_image
   WHERE med_id = mdcn_id;

END;
$BODY$;

--MAG ADD MED FOR ADMIN
CREATE OR REPLACE PROCEDURE public.add_medpharm(
	IN mdcn_name integer,
	IN mdcn_quan integer,
	IN mdcn_price integer,
	IN mdcn_stat character varying,
	IN mdcn_added date,
	IN mdcn_exp date,
	IN mdcn_pharm integer)
LANGUAGE 'plpgsql'
AS $BODY$
BEGIN
   INSERT INTO med_pharm(med_name, med_quan, med_price, med_stat, med_added, med_exp, pharmacy)
   VALUES(mdcn_name, mdcn_quan, mdcn_price, mdcn_stat, mdcn_added, mdcn_exp, mdcn_pharm);
END;
$BODY$;

--GET MEDICINE FOR LOGIN
CREATE OR REPLACE FUNCTION public.get_medicine(
	)
    RETURNS TABLE(mdcn_id integer, mdcn_name character varying, mdcn_pack character varying, mdcn_dosage character varying, mdcn_class character varying, mdcn_images character varying, mdcn_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			medicine.med_id,
		  	medicine.med_name,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
		  	medicine.images,
		  	medicine.med_desc
		from
			medicine
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		order by med_name asc;
end;
$BODY$;


--GET MEDICINE FOR LOGIN
CREATE OR REPLACE FUNCTION public.get_medicine(
	med_pattern integer)
    RETURNS TABLE(mdcn_id integer, mdcn_name character varying, mdcn_pack character varying, mdcn_dosage character varying, mdcn_class character varying, mdcn_images character varying, mdcn_desc character varying) 
    LANGUAGE 'plpgsql'
    COST 100
    VOLATILE PARALLEL UNSAFE
    ROWS 1000

AS $BODY$
begin
	return query 
		select
			medicine.med_id,
		  	medicine.med_name,
		  	packaging.pack_name,
		  	medicine.med_dosage,
		  	classification.class_name,
		  	medicine.images,
		  	medicine.med_desc
		from
			medicine
		inner join packaging ON packaging.pack_id = medicine.med_pack
		inner join classification ON classification.class_id = medicine.med_class
		order by med_name asc;
end;
$BODY$;


--MAG GET SA USERS
create or replace function get_users (
  users_pattern varchar, users_password varchar
) 
	returns table (
		usrs_id int,
		usrs_name varchar,
  		usrs_email varchar,
  		usrs_password varchar,
  		usrs_pharmacy varchar)
	language plpgsql
as $$
begin
	return query 
		select
			users.id,
			users.name,
  			users.email,
  			users.password,
  			pharmacy_details.pharm_name
		from
			users
		inner join pharmacy_details 
		ON pharmacy_details.pharm_id = users.pharmacy
		where
			users.email = users_pattern AND
			users.password = users_password;
end;$$


--INSERTION--INSERTION--INSERTION--INSERTION--INSERTION--INSERTION--INSERTION--
--INSERTING VALUES INTO TABLES--

INSERT INTO pharmacy_details (pharm_id, pharm_name, pharm_address, pharm_no, pharm_email, pharm_open, pharm_close, cover, map, direction) VALUES
(1, 'RM Health & Med', '66RW+43X, Tibanga Highway, Iligan City', '0906839123', 'rmpharmacy@gmail.com', '08:00:00', '22:00:00', 'rm.png', 'RM Pharmacy, Tibanga, Iligan City', '/66RW%2B43X+RM+Pharmacy+Health+%26+Med,+Iligan+City,+Lanao+del+Norte/@8.2403664,124.2430481'),
(2, '18th Avenue Pharmacy', '66RW+HMG, Tibanga Highway, Iligan City', '(063) 228-6293', '18thavepharmacy@gmail.com', '08:00:00', '22:00:00', '18thave.jpg', '18th Avenue Pharmacy, Tibanga, Iligan City', '/66RW%2BHMG+18th+Avenue+Pharmacy,+Tibanga+Highway,+Iligan+City,+Lanao+del+Norte/@8.2414538,124.2445'),
(3, 'Super Admin','','','superadmin@gmail.com', '00:00:00','00:00:00','','','');

INSERT INTO users (id, name, email, password, pharmacy) VALUES
(1, 'RM Health & Med Pharmacy', 'rmpharmacy@gmail.com', 'medfind', 1),
(2, '18th Avenue Pharmacy', '18thavenue@gmail.com', 'medfind', 2),
(3, 'Super Admin', 'superadmin@gmail.com', 'medfind', 3);


INSERT INTO classification (class_id, class_name) VALUES
(101, 'Liquid'),
(102, 'Tablet'),
(103, 'Capsules'),
(104, 'Injections'),
(105, 'Implants'),
(106, 'Drops'),
(107, 'Topical'),
(108, 'Suppositories'),
(110, 'Cream'),
(112, 'Syrup'),
(114, 'Suspension'),
(115, 'Powder'),
(116, 'Gel'),
(117, 'Solution'),
(118, 'Inhaler'),
(119, 'Nebules');


INSERT INTO packaging (pack_id, pack_name) VALUES
(201, 'Vials'),
(202, 'Bottles'),
(203, 'Blister Packs'),
(204, 'Sachets'),
(205, 'Syringes'),
(206, 'Ampoules'),
(207, 'Cartons'),
(208, 'Boxes'),
(209, 'Tube'),
(210, 'Set');


INSERT INTO medicine (med_id, med_name, med_pack, med_dosage, med_class, images, med_desc) VALUES
(119, 'Biogesic', 202, '250mg/60mL', 101,  'Biogesic 60ml Susp.jpg', 'medicine for flu'),
(120, 'Biogesic', 203, '500mg', 102, 'Biogesic-Tablet-Product-Shot-New.jpg', 'medicine for flu'),
(121, 'BL Cream Rx', 207, '7g', 110, 'BL Cream Rx.jpg', 'moisturizer, diaper rash, skin burns'),
(122, 'BL Cream', 209, '10g', 110, 'BL Cream Tube.jpg', 'moisturizer, diaper rash, skin burns'),
(123, 'Blood Set Terumo', 210, 'n/a', 104, 'Blood set.png', 'blood'),
(126, 'Broncaire Expectorant', 202, '60mL', 101, 'Broncaire 60ml.webp', 'bronchitis, pneumonia, influenza'),
(127, 'Bronchofen', 202, '1mg/0.8mg/mL/15mL', 106, 'Bronchofen-Drops.jpg', 'allergy'),
(128, 'Burinex', 203, '1mg', 102, 'Burinex.jpg', 'heart condiitons, heart failure, liver disease, kidney disease'),
(129, 'Buscopan', 203, '10mg', 102, 'Buscopan 10 mg.jpg', 'painful stomach cramps'),
(130, 'Aciclovir', 203, '200mg', 102, 'Aciclovir.jpg', 'chicken pox, herpes infection'),
(131, 'Aciclovir', 203, '500mg', 102, 'aciclovir-400mg.jpg', 'chicken pox, herpes infection'),
(132, 'Advil Liquigel', 203, '200mg', 103, 'advil 200mg.webp', 'body pain, headache'),
(133, 'Alaxan FR', 203, '200mg/325mg', 103, 'alaxan capsule 200-325 mg.webp', 'body pain, headache'),
(134, 'Ambroxol', 203, '15mg', 102, 'ambroxol 30mg.jpg', 'cough'),
(135, 'Ambroxol', 203, '75mg', 102, 'ambroxol 75mg.webp', 'cough'),
(136, 'Ambroxol', 207, '15ml', 106, 'ambroxol drop.png', 'cough'),
(138, 'Advil', 203, '250mg', 102, 'Biogesic-Tablet-Product-Shot-New.jpg', 'body pain, headache'),
(139, 'Enalapril', 203, '20mg', 102, 'advil 200mg.webp', 'hypertension, heart failure'),
(140, 'Rebamipide', 203, '100mg', 102, 'Screenshot_20230109_044058.png', 'hyperacidity, ulcer'),
(141, 'Aciclovir', 203, '400mg', 102, 'Screenshot_20230109_044351.png', 'chicken pox, herpes infection'),
(142, 'Aciclovir', 203, '800mg', 102, 'Screenshot_20230109_044422.png', 'chicken pox, herpes infection'),
(143, 'Ambroxol', 207, '15mg/120ml',112, 'Screenshot_20230109_044525.png', 'cough'),
(144, 'Ambroxol', 207, '15mg/60ml', 112, 'Screenshot_20230109_044544.png','cough'),
(145, 'Ambroxol', 203, '30mg', 102, 'Screenshot_20230109_044604.png', 'cough'),
(146, 'Ambroxol', 207, '30mg/120ml', 112, 'Screenshot_20230109_044630.png', 'cough'),
(147, 'Ambroxol', 207, '30mg/60ml', 112, 'Screenshot_20230109_044650.png', 'cough'),
(150, 'Amoxicillin', 203, '250mg', 103, 'Screenshot_20230109_044705.png', 'antibacterial'),
(152, 'Appetite Stimulant', 203, 'n/a', 102, 'Screenshot_20230109_050436.png', 'vitamins'),
(153, 'Ascorbic + Zinc', 203, '500mg', 102, 'Screenshot_20230109_050457.png', 'adult vitamins'),
(154, 'Ascorbic Acid', 207, '100mg/120ml', 112, 'Screenshot_20230109_050522.png', 'vitamins'),
(156, 'Zinc-C', 207, '120ml', 112, 'Screenshot_20230109_050547.png', 'vitamins'),
(157, 'Atenolol', 203, '100mg', 102, 'Screenshot_20230109_050605.png', 'heart conditions'),
(158, 'Atenolol', 203, '50mg', 102, 'Screenshot_20230109_050617.png', 'heart conditions'),
(159, 'Atorvastatin', 203, '10mg', 102, 'Screenshot_20230109_050635.png', 'heart conditions'),
(160, 'Atorvastatin', 203, '20mg', 102, 'Screenshot_20230109_050653.png', 'heart conditions'),
(161, 'Atorvastatin', 203, '40mg', 102, 'Screenshot_20230109_050714.png', 'heart conditions'),
(162, 'Azithromycin', 203, '500mg', 102, 'Screenshot_20230109_050732.png', 'infections'),
(163, 'Betamethasone', 203, '250mcg/2mg', 102, 'Screenshot_20230109_050750.png', 'allergy'),
(164, 'Betamethasone', 209, '500mcg/5g', 110, 'Screenshot_20230109_050807.png', 'dermatologicals'),
(165, 'Bisacodyl', 203, '5mg', 102, 'Screenshot_20230109_050828.png', 'constipation'),
(166, 'Bisoprolol', 203, '5mg', 102, 'Screenshot_20230109_050849.png', 'heart conditions'),
(167, 'Captopril', 203, '25mg', 102, 'Screenshot_20230109_060142.png', 'heart conditions'),
(168, 'Carbamazepine', 203, '200mg', 102, 'Screenshot_20230109_060156.png', 'anti-epilepsy, anti-convulsant'),
(169, 'Carbocisteine', 203, '500mg', 102, 'Screenshot_20230109_060206.png', 'cough'),
(170, 'Cefaclor', 207, '250mg', 114, 'Screenshot_20230109_060306.png', 'infections'),
(171, 'Cefalexin', 207, '100mg/10ml', 106, 'Screenshot_20230109_060317.png', 'infections'),
(172, 'Cefalexin', 207, '125mg/60ml', 114, 'Screenshot_20230109_060329.png', 'infections'),
(173, 'Cefalexin', 203, '250mg', 103, 'Screenshot_20230109_060342.png', 'anti-infectives'),
(174, 'Cefalexin', 207, '250mg/60ml', 114, 'Screenshot_20230109_060352.png', 'infections'),
(175, 'Cefepime', 201, '1g', 115, 'Screenshot_20230109_060402.png', 'infections, antibacterial'),
(176, 'Cefepime', 201, '2g', 115, 'Screenshot_20230109_060421.png', 'infections, antibacterial'),
(177, 'Cefepime', 203, '200mg', 103, 'Screenshot_20230109_060430.png', 'infections, antibacterial'),
(178, 'Ceftriaxone', 201, '1g', 101, 'Screenshot_20230109_060442.png', 'infections, antibacterial'),
(179, 'Cefuroxime', 201, '150mg', 115, 'Screenshot_20230109_061931.png', 'infections, antibacterial'),
(180, 'Cefuroxime', 203, '250mg', 102, 'Screenshot_20230109_061943.png', 'infections, antibacterial'),
(181, 'Cefuroxime', 203, '500mg', 102, 'Screenshot_20230109_061953.png', 'infections, antibacterial'),
(182, 'Celecoxib', 203, '200mg', 103, 'Screenshot_20230109_062002.png', 'body pain, arthritis'),
(183, 'Cetirizine', 203, '10mg', 102, 'Screenshot_20230109_062011.png', 'allergy'),
(184, 'Cetirizine', 207, '5mg/60ml', 112, 'Screenshot_20230109_062023.png', 'allergy'),
(185, 'Cinnarizine', 203, '25mg', 102, 'Screenshot_20230109_062036.png', 'anti-epilepsy, anti-convulsant'),
(186, 'Ciprofloxacin', 203, '500mg', 102, 'Screenshot_20230109_062044.png', 'infections, antibacterial'),
(187, 'Clarithromycin', 203, '500mg', 102, 'Screenshot_20230109_062055.png', 'infections, antibacterial'),
(188, 'Clindamycin', 203, '150mg', 103, 'Screenshot_20230109_062106.png', 'infections, antibacterial'),
(189, 'Clindamycin', 203, '300mg', 103, 'Screenshot_20230109_062114.png', 'infections, antibacterial'),
(190, 'Clobetasol Propionate', 209, '500mcg/10g', 110, 'Screenshot_20230109_062133.png', 'antipruritic'),
(191, 'Clonidine', 203, '150mg', 102, 'Screenshot_20230109_063829.png', 'antihypersentive'),
(192, 'Clonidine', 203, '75mg', 102, 'Screenshot_20230109_063843.png', 'antihypertensive, heart conditions'),
(193, 'Clopidogrel', 203, '75mg', 102, 'Screenshot_20230109_063853.png', 'antihypertensive, heart conditions'),
(194, 'Cloxacillin', 203, '500mg', 103, 'Screenshot_20230109_063904.png', 'infections, antibacterial'),
(195, 'Co-amoxiclav', 203, '1g', 102, 'Screenshot_20230109_063914.png', 'infections, antibacterial'),
(196, 'Co-amoxiclav', 203, '625mg', 102, 'Screenshot_20230109_063925.png', 'infections, antibacterial'),
(197, 'Colchicine', 203, '500mg', 102, 'Screenshot_20230109_063935.png', 'anti-gout'),
(198, 'Diclofenac', 203, '50mg', 102, 'Screenshot_20230109_063943.png', 'body pain, arthritis'),
(199, 'Dicycloverine', 202, '10mg', 102, 'Screenshot_20230109_063952.png', 'anticholinergic'),
(200, 'Diphenhydramine', 203, '50mg', 103, 'Screenshot_20230109_064001.png', 'allergy'),
(201, 'Domperidone', 203, '10mg', 102, 'Screenshot_20230109_064013.png', 'anti-emetic'),
(202, 'Doxycycline', 203, '100mg', 103, 'Screenshot_20230109_064022.png', 'infections, antibacterial'),
(203, 'Erythromycin', 203, '500mg', 102, 'Screenshot_20230109_064031.png', 'infections, antibacterial'),
(204, 'Escitalopram', 203, '10mg', 102, 'Screenshot_20230109_064040.png', 'anti-epilepsy, anti-convulsant'),
(205, 'Felodipine', 203, '5mg', 102, 'Screenshot_20230109_064050.png', 'heart conditions'),
(206, 'Fibermate', 204, 'n/a', 115, 'Screenshot_20230109_064059.png', 'supplement'),
(207, 'Fluoxetine', 203, '20mg', 103, 'Screenshot_20230109_064109.png', 'anti-epilepsy, anti-convulsant'),
(208, 'Folic Acid', 203, '5mg', 102, 'Screenshot_20230109_064117.png', 'vitamins'),
(209, 'Frusema', 203, '10mg', 102, 'Screenshot_20230109_064126.png', 'hypertension'),
(210, 'Frusema', 203, '40mg', 102, 'Screenshot_20230109_071027.png', 'hypertension'),
(211, 'Glibenclamide', 203, '5mg', 102, 'Screenshot_20230109_071039.png', 'diabetes'),
(212, 'Gliclazide', 203, '80mg', 102, 'Screenshot_20230109_071049.png', 'diabetes'),
(213, 'Glimepiride', 203, '2mg', 102, 'Screenshot_20230109_071057.png', 'diabetes'),
(214, 'Glimepiride', 203, '3mg', 102, 'Screenshot_20230109_071105.png', 'diabetes'),
(215, 'Glucosamine', 204, '1.5g', 115, 'Screenshot_20230109_071116.png', 'body pain, arthritis'),
(216, 'Hexetidine', 207, '120ml', 112, 'Screenshot_20230109_071124.png', 'sore throat'),
(217, 'Hexeditine', 207, '60ml', 112, 'Screenshot_20230109_071133.png', 'sore throat'),
(218, 'Hydrocort', 209, '10mg/15g', 110, 'Screenshot_20230109_071153.png', 'allergy'),
(219, 'Ibuprofen', 203, '200mg', 103, 'Screenshot_20230109_071201.png', 'somatics'),
(220, 'Irbesartan', 203, '150mg', 102, 'Screenshot_20230109_071209.png', 'cardio'),
(221, 'Irbesartan', 203, '300mg', 102, 'Screenshot_20230109_071217.png', 'cardio'),
(222, 'Iron + Folic', 203, 'n/a', 102, 'Screenshot_20230109_071225.png', 'vitamins'),
(223, 'Isoniazid + Pyridoxine Hydrochloride', 207, '200mg/12mg', 112, 'Screenshot_20230109_071235.png', 'tuberculosis'),
(224, 'Lagundi', 207, '120ml', 112, 'Screenshot_20230109_071309.png', 'anti-cough, anti-asthma, cough'),
(225, 'Lagundi', 207, '60ml', 112, 'Screenshot_20230109_071317.png', 'anti-cough, anti-asthma, cough'),
(226, 'Lansoprazole', 203, '30mg', 103, 'Screenshot_20230109_071325.png', 'inhibitor'),
(227, 'Levocetirizine', 203, '5mg', 102, 'Screenshot_20230109_071335.png', 'allergy'),
(228, 'Levofloxacin', 203, '500mg', 102, 'Screenshot_20230109_071343.png', 'infections, antibacterial'),
(229, 'Loratadine', 203, '10mg', 102, 'Screenshot_20230109_071349.png', 'allergy'),
(230, 'Losartan + Hydrochlorothiazide', 203, '100mg', 102, 'Screenshot_20230109_071359.png', 'heart conditions'),
(231, 'Losartan + Hydrochlorothiazide', 203, '50mg', 102, 'Screenshot_20230109_071459.png', 'heart conditions'),
(232, 'Losartan', 203, '100mg', 102, 'Screenshot_20230109_071506.png', 'heart conditions'),
(233, 'Losartan', 203, '50mg', 102, 'Screenshot_20230109_071516.png', 'heart conditions'),
(234, 'Mefenamic Acid', 203, '250mg', 102, 'Screenshot_20230109_071525.png', 'body pain, arthritis'),
(235, 'Mefenamic Acid', 203, '500mg', 102, 'Screenshot_20230109_071535.png', 'body pain, arthritis'),
(236, 'Meloxicam', 203, '15mg', 102, 'Screenshot_20230109_071544.png', 'body pain, arthritis'),
(237, 'Meloxicam', 203, '7.5mg', 102, 'Screenshot_20230109_071553.png', 'body pain, arthritis'),
(238, 'Meropenem', 201, '1g', 115, 'Screenshot_20230109_071601.png', 'anti-infectives, infections'),
(239, 'Meropenem', 201, '500mg', 115, 'Screenshot_20230109_071610.png', 'anti-infectives, infections'),
(240, 'Metformin', 203, '500mg', 102, 'Screenshot_20230109_071616.png', 'diabetes'),
(241, 'Metformin', 203, '850mg', 102, 'Screenshot_20230109_071624.png', 'diabetes'),
(243, 'Metropolol Tartrate', 203, '100mg', 110, 'Screenshot_20230109_071632.png', 'heart conditions'),
(244, 'Metropolol Tartrate', 203, '50mg', 102, 'Screenshot_20230109_071924.png', 'heart conditions'),
(245, 'Metronidazole', 209, '10mg/10g', 116, 'Screenshot_20230109_071934.png', 'dermatologicals'),
(246, 'Metronidazole', 203, '500mg', 102, 'Screenshot_20230109_071944.png', 'amoebiasis'),
(247, 'Mometasone', 209, '5g', 110, 'Screenshot_20230109_071952.png', 'dermatologicals'),
(248, 'Montelukast', 203, '10mg', 102, 'Screenshot_20230109_072001.png', 'asthma'),
(249, 'Montelukast Chew', 203, '5mg', 102, 'Screenshot_20230109_072011.png', 'asthma'),
(250, 'Multivitamins + CGF', 207, '120ml', 112, 'Screenshot_20230109_072018.png', 'vitamins'),
(251, 'Mupirocin', 209, '5g', 110, 'Screenshot_20230109_072027.png', 'anti-infectives, infections'),
(252, 'Naproxen Sodium', 203, '500mg', 102, 'Screenshot_20230109_072039.png', 'body pain, arthritis'),
(253, 'Neutracid', 203, '200mg', 102, 'Screenshot_20230109_072137.png', 'hyperacidity, ulcer'),
(254, 'Nicardia XL', 203, '30mg', 102, 'Screenshot_20230109_072146.png', 'cardio'),
(255, 'Omeprazole', 203, '20mg', 102, 'Screenshot_20230109_072154.png', 'hyperacidity, ulcer'),
(256, 'Omeprazole', 203, '40mg', 103, 'Screenshot_20230109_072207.png', 'hyperacidity, ulcer'),
(257, 'Pantoprazole', 201, '40mg', 115, 'Screenshot_20230109_072218.png', 'hyperacidity, ulcer'),
(258, 'Paracetamol', 207, '120mg/60ml', 112, 'Screenshot_20230109_072230.png', 'fever, pain'),
(259, 'Paracetamol', 209, '125mg', 108, 'Screenshot_20230109_072240.png', 'fever, pain'),
(260, 'Paracetamol', 207, '250mg/60ml', 112, 'Screenshot_20230109_072248.png', 'fever, pain'),
(261, 'Paracetamol', 203, '500mg', 102, 'Screenshot_20230109_072256.png', 'fever, pain'),
(262, 'Paramax', 203, '325mg/200mg', 102, 'Screenshot_20230109_072309.png', 'fever, headache'),
(263, 'Potassium Citrate', 203, 'n/a', 102, 'Screenshot_20230109_072323.png', 'anti-urolithic'),
(264, 'Povidone Iodine 30%', 202, '30ml', 101, 'Screenshot_20230109_072332.png', 'home remedies'),
(265, 'Povidone Iodine 30%', 202, '60ml', 101, 'Screenshot_20230109_072341.png', 'home remedies'),
(266, 'Pregabalin', 203, '150mg', 103, 'Screenshot_20230109_072349.png', 'antiepileptic'),
(267, 'Pregabalin', 203, '75mg', 103, 'Screenshot_20230109_072358.png', 'antiepileptic'),
(268, 'Risperidone', 203, '2mg', 102, 'Screenshot_20230109_081924.png', 'anti-epilepsy, anti-convulsant'),
(269, 'Rosuvastatin', 203, '10mg', 102, 'Screenshot_20230109_081936.png', 'cholesterol'),
(270, 'Rosuvastatin', 203, '20mg', 102, 'Screenshot_20230109_081944.png', 'cholesterol'),
(271, 'Salbutamol', 203, '2mg', 102, 'Screenshot_20230109_081953.png', 'asthma'),
(272, 'Sildenafil', 203, '100mg', 102, 'Screenshot_20230109_082038.png', 'erectile dysfunction'),
(273, 'Sildenafil', 203, '50mg', 102, 'Screenshot_20230109_082048.png', 'erectile dysfunction'),
(274, 'Simvastatin', 203, '20mg', 102, 'Screenshot_20230109_082105.png', 'heart conditions'),
(275, 'Simvastatin', 203, '40mg', 102, 'Screenshot_20230109_082113.png', 'heart conditions'),
(276, 'Terazosin', 203, '2mg', 102, 'Screenshot_20230109_082121.png', 'prostate enlargement'),
(277, 'Terazosin', 203, '5mg', 102, 'Screenshot_20230109_082129.png', 'prostate enlargement'),
(278, 'Tolnaftate', 207, '10mg/15g', 110, 'Screenshot_20230109_082137.png', 'dermatologicals'),
(279, 'Tramadol + Paracetamol', 203, '325mg', 102, 'Screenshot_20230109_082149.png', 'somatics'),
(280, 'Tri-V', 209, 'n/a', 108, 'Screenshot_20230109_082200.png', 'anti-fungal, anti-protozoal'),
(281, 'Trimetazidine', 203, '35mg', 102, 'Screenshot_20230109_082208.png', 'heart conditions'),
(282, 'Valsartan', 203, '160mg', 102, 'Screenshot_20230109_082216.png', 'cardio'),
(283, 'Valsartan', 203, '80mg', 102, 'Screenshot_20230109_082224.png', 'cardio'),
(284, 'Verapamil', 203, '240mg', 102, 'Screenshot_20230109_082232.png', 'heart conditions'),
(285, 'Vitamin B Complex', 203, 'n/a', 102,'Screenshot_20230109_082232.png', 'vitamins'),
(286, 'Zelexin', 203, '250mg', 103, 'Screenshot_20230109_082241.png', 'antibacterial, infections'),
(287, 'Zelexin', 203, '500mg', 103, 'Screenshot_20230109_082251.png', 'antibacterial, infections'),
(288, 'Clopidogrel', 203, '75mg', 102, 'Screenshot_20230109_082300.png', 'infections'),
(289, 'Losartan', 203, '100mg', 102, 'Screenshot_20230109_082307.png', ''),
(290, 'Losartan', 203, '50mg', 102, 'Screenshot_20230109_082318.png', ''),
(292, 'Amlodipine', 203, '10mg', 102, 'Screenshot_20230109_082327.png', ''),
(294, 'Clarithromycin', 203, '500mg', 102, 'Screenshot_20230109_082334.png', ''),
(295, 'Irbesartan', 203, '300mg', 102, 'Screenshot_20230109_082416.png', ''),
(297, 'Ciprofloxacin', 203, '500mg', 102, 'Screenshot_20230109_082442.png', ''),
(298, 'Clopidogrel', 203, '75mg', 102, 'Screenshot_20230109_092158.png', ''),
(299, 'Irbesartan', 203, '150mg', 102, 'Screenshot_20230109_092210.png', ''),
(300, 'Losartan', 203, '100mg', 102, 'Screenshot_20230109_092218.png', ''),
(301, 'Omeprazole', 203, '20mg', 102, 'Screenshot_20230109_092227.png', ''),
(302, 'Turmeric', 203, '500mg', 102, 'Screenshot_20230109_093720.png', 'home remedies'),
(303, 'Mangosteen + Malunggay', 203, '500mg', 102, 'Screenshot_20230109_093807.png', 'home remedies'),
(305, 'Pantroprazole Sodium', 203, '40mg', 102, 'Screenshot_20230109_093816.png', ''),
(307, 'Losartan', 203, '50mg', 102, 'Screenshot_20230109_093826.png', ''),
(308, 'Naproxen Sodium', 203, '550mg', 102, 'Screenshot_20230109_093835.png', ''),
(309, 'Simvastatin', 203, '20mg', 102, 'Screenshot_20230109_093843.png', ''),
(310, 'D-Alpha Vitamin E', 203, '400lu', 103, 'Screenshot_20230109_093853.png', ''),
(311, 'Ampalaya', 203, '500mg', 103, 'Screenshot_20230109_093901.png', 'home remedies'),
(313, 'Loperamide', 203, '2mg', 103, 'Screenshot_20230109_093926.png', ''),
(314, 'Mefenamic', 203, '500mg', 103, 'Screenshot_20230109_093935.png', ''),
(317, 'Metropolol', 203, '50mg', 102, 'Screenshot_20230109_093943.png', '');


INSERT INTO med_pharm (med_pharm_id, med_name, med_quan, med_price, med_stat, med_added, med_exp, pharmacy) VALUES
(2010, 119, 121, '140.00', 'Available', '2022-12-15', '2024-07-23', 2),
(2011, 120, 500, '4.50', 'Available', '2022-12-15', '2023-08-15', 2),
(2015, 121, 34, '44.00', 'Available', '2022-12-15', '2024-03-13', 2),
(2016, 122, 68, '60.00', 'Available', '2022-12-15', '2025-03-11', 2),
(2017, 123, 10, '120.00', 'Available', '2022-12-15', '2024-06-15', 2),
(2024, 126, 59, '115.00', 'Available', '2022-12-15', '2022-12-05', 2),
(2025, 127, 270, '121.00', 'Available', '2022-12-15', '2025-01-13', 2),
(2026, 128, 100, '25.90', 'Available', '2022-12-15', '2024-08-30', 2),
(2027, 129, 15, '28.00', 'Available', '2022-12-15', '2022-12-10', 2),
(2028, 130, 5, '7.50', 'Available', '2022-12-15', '2022-12-05', 1),
(2029, 131, 38, '20.25', 'Available', '2022-12-15', '2024-08-01', 1),
(2030, 132, 7, '36.00', 'Available', '2022-12-15', '2024-05-05', 1),
(2031, 133, 53, '8.00', 'Available', '2022-12-15', '2025-06-13', 1),
(2037, 134, 234, '1.00', 'Available', '2022-12-15', '2022-12-01', 1),
(2038, 135, 167, '12.00', 'Available', '2022-12-15', '2023-10-04', 1),
(2044, 136, 56, '30.00', 'Available', '2022-12-15', '2024-09-20', 1),
(2045, 119, 65, '3.60', 'Available', '2022-12-15', '2024-01-30', 1),
(2046, 138, 673, '23.00', 'Available', '2022-12-16', '2022-12-31', 1),
(2047, 139, 25, '16.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2048, 140, 54, '20.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2049, 141, 0, '68.00', 'Not Available', '2023-01-18', '2023-12-31', 1),
(2050, 142, 12, '125.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2051, 143, 15, '120.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2052, 144, 16, '72.00', 'Available', '2023-01-18', '2023-02-11', 1),
(2053, 145, 89, '8.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2054, 146, 41, '150.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2055, 147, 21, '80.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2056, 146, 91, '9.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2057, 147, 21, '6.47', 'Available', '2023-01-18', '2023-12-31', 1),
(2058, 150, 42, '5.50', 'Available', '2023-01-18', '2023-12-31', 1),
(2059, 150, 154, '7.50', 'Available', '2023-01-18', '2023-12-31', 1),
(2060, 152, 45, '15.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2061, 153, 120, '6.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2075, 154, 41, '95.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2082, 154, 121, '2.25', 'Available', '2023-01-18', '2023-12-31', 1),
(2083, 156, 54, '106.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2084, 157, 41, '12.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2085, 158, 41, '6.50', 'Available', '2023-01-18', '2023-12-31', 1),
(2086, 159, 96, '13.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2087, 160, 47, '16.50', 'Available', '2023-01-18', '2023-12-31', 1),
(2088, 161, 47, '22.75', 'Available', '2023-01-18', '2023-02-11', 1),
(2089, 162, 74, '106.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2090, 163, 45, '15.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2091, 164, 21, '245.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2092, 165, 74, '15.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2093, 166, 45, '15.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2094, 167, 87, '11.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2095, 168, 74, '10.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2096, 169, 85, '6.50', 'Available', '2023-01-18', '2023-12-31', 1),
(2097, 170, 12, '630.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2098, 171, 41, '103.75', 'Available', '2023-01-18', '2023-12-31', 1),
(2099, 172, 45, '114.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2100, 173, 74, '14.50', 'Available', '2023-01-18', '2023-12-31', 1),
(2101, 174, 41, '186.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2102, 175, 12, '1400.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2103, 176, 11, '2700.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2104, 177, 21, '90.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2105, 178, 4, '770.71', 'Available', '2023-01-18', '2023-12-21', 1),
(2106, 179, 7, '242.86', 'Available', '2023-01-18', '2023-12-31', 1),
(2107, 180, 74, '31.00', 'Available', '2023-01-18', '2023-12-21', 1),
(2108, 181, 74, '52.75', 'Available', '2023-01-18', '2023-12-21', 1),
(2109, 182, 45, '23.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2110, 183, 112, '16.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2111, 184, 54, '200.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2112, 185, 41, '36.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2113, 186, 41, '24.26', 'Available', '2023-01-18', '2023-12-12', 1),
(2114, 187, 74, '57.55', 'Available', '2023-01-18', '2023-12-31', 1),
(2115, 188, 12, '21.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2116, 189, 41, '37.75', 'Available', '2023-01-18', '2023-12-12', 1),
(2117, 190, 14, '250.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2118, 191, 41, '25.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2119, 192, 41, '17.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2120, 193, 47, '20.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2121, 194, 41, '17.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2122, 195, 74, '58.75', 'Available', '2023-01-18', '2023-12-12', 1),
(2123, 196, 45, '36.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2124, 197, 78, '4.35', 'Available', '2023-01-18', '2023-12-12', 1),
(2125, 198, 14, '16.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2126, 199, 74, '10.00', 'Available', '2023-01-18', '2023-12-31', 1),
(2127, 200, 121, '8.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2128, 201, 65, '13.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2129, 202, 14, '45.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2130, 203, 87, '18.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2131, 204, 47, '45.20', 'Available', '2023-01-18', '2023-12-12', 1),
(2132, 205, 74, '12.75', 'Available', '2023-01-18', '2023-12-13', 1),
(2133, 206, 53, '20.75', 'Available', '2023-01-18', '2023-12-12', 1),
(2134, 207, 47, '30.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2135, 208, 120, '5.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2136, 209, 45, '3.44', 'Available', '2023-01-18', '2023-12-12', 1),
(2137, 210, 41, '5.20', 'Available', '2023-01-18', '2023-12-12', 1),
(2138, 211, 74, '5.80', 'Available', '2023-01-18', '2023-12-12', 1),
(2139, 212, 45, '6.75', 'Available', '2023-01-18', '2023-12-12', 1),
(2140, 213, 45, '11.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2141, 214, 41, '12.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2142, 215, 74, '50.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2143, 216, 75, '148.00', 'Available', '2023-01-18', '2023-12-14', 1),
(2144, 217, 41, '89.00', 'Available', '2023-01-18', '2023-12-14', 1),
(2145, 218, 14, '215.00', 'Available', '2023-01-18', '2023-12-12', 1),
(2146, 219, 47, '4.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2147, 220, 47, '17.20', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2148, 221, 120, '28.20', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2149, 222, 74, '4.00', 'Available', '2023-01-18', '2023-02-21', 1 ),
(2150, 223, 41, '50.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2151, 224, 23, '136.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2152, 225, 41, '94.50', 'Available', '2023-01-18', '2023-12-04', 1 ),
(2153, 226, 74, '76.67', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2154, 227, 12, '18.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2155, 228, 14, '54.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2156, 229, 41, '19.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2157, 230, 47, '16.25', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2158, 231, 41, '13.25', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2190, 232, 132, '15.23', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2191, 233, 42, '11.66', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2192, 234, 146, '3.75', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2193, 235, 141, '4.75', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2194, 236, 41, '43.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2195, 237, 45, '29.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2196, 238, 15, '1600.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2197, 239, 11, '950.00', 'Available', '2023-01-18', '2023-10-12', 1 ),
(2198, 240, 121, '3.50', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2201, 241, 124, '7.50', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2203, 241, 43, '6.25', 'Available', '2023-01-18', '2023-10-10', 1 ),
(2204, 243, 41, '4.90', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2205, 244, 12, '3.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2206, 245, 14, '328.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2207, 246, 54, '14.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2208, 247, 12, '290.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2209, 248, 54, '32.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2210, 249, 45, '22.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2211, 250, 51, '105.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2212, 251, 14, '225.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2213, 252, 41, '13.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2214, 253, 41, '3.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2215, 254, 54, '31.25', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2216, 255, 41, '27.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2217, 256, 14, '39.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2218, 257, 14, '730.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2219, 258, 24, '50.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2220, 259, 145, '9.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2221, 260, 14, '75.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2222, 261, 45, '2.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2223, 262, 45, '5.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2224, 263, 45, '14.88', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2225, 264, 17, '55.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2226, 265, 15, '90.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2227, 266, 45, '52.90', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2228, 267, 12, '36.61', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2229, 268, 45, '75.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2230, 269, 26, '28.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2231, 270, 74, '34.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2232, 271, 45, '4.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2233, 272, 56, '223.21', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2234, 273, 42, '133.93', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2235, 274, 45, '16.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2236, 275, 47, '24.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2237, 276, 78, '26.79', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2238, 277, 46, '32.14', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2239, 278, 74, '250.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2240, 279, 45, '40.00', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2241, 280, 45, '157.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2242, 281, 45, '13.39', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2243, 282, 14, '25.00', 'Available', '2023-01-18', '2023-11-12', 1 ),
(2244, 283, 14, '17.86', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2245, 284, 45, '42.50', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2268, 285, 45, '4.95', 'Available', '2023-01-18', '2023-12-12', 1 ),
(2269, 286, 78, '14.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2270, 287, 54, '20.50', 'Available', '2023-01-18', '2023-12-12', 1),
(2271, 288, 47, '153.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2272, 289, 47, '120.50', 'Available', '2023-01-18', '2023-12-12', 2),
(2273, 290, 104, '88.50', 'Available', '2023-01-18', '2023-12-12', 2),
(2274, 290, 47, '79.00', 'Available', '2023-01-18', '2023-12-12', 2),
(2275, 292, 78, '58.00', 'Available', '2023-01-18', '2023-12-12', 2),
(2276, 292, 47, '39.25', 'Available', '2023-01-18', '2023-12-12', 2),
(2277, 294, 45, '35.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2278, 295, 45, '21.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2279, 295, 47, '19.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2280, 297, 48, '17.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2281, 298, 51, '14.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2282, 299, 45, '14.00', 'Available', '2023-01-18', '2023-12-12', 2),
(2283, 300, 45, '12.50', 'Available', '2023-01-18', '2023-12-12', 2),
(2284, 301, 56, '12.28', 'Available', '2023-01-18', '2023-12-12', 2),
(2285, 302, 47, '12.00', 'Available', '2023-01-18', '2023-02-12', 2),
(2286, 303, 87, '12.00', 'Available', '2023-01-18', '2023-12-12', 2),
(2287, 303, 59, '11.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2288, 305, 56, '10.71', 'Available', '2023-01-18', '2023-12-12', 2),
(2289, 307, 56, '9.25', 'Available', '2023-01-18', '2023-12-12', 2),
(2290, 307, 54, '9.25', 'Available', '2023-01-18', '2023-12-12', 2),
(2291, 308, 45, '8.93', 'Available', '2023-01-18', '2023-12-12', 2),
(2292, 309, 45, '8.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2293, 310, 123, '247.50', 'Available', '2023-01-18', '2023-12-12', 2),
(2294, 311, 56, '7.00', 'Available', '2023-01-18', '2023-12-12', 2),
(2295, 310, 26, '6.25', 'Available', '2023-01-18', '2023-12-12', 2),
(2296, 313, 46, '50.00', 'Available', '2023-01-18', '2023-12-31', 2),
(2297, 314, 65, '4.75', 'Available', '2023-01-18', '2023-12-12', 2),
(2298, 314, 65, '4.50', 'Available', '2023-01-18', '2023-12-12', 2),
(2299, 317, 56, '55.00', 'Available', '2023-01-18', '2023-12-12', 2),
(2300, 317, 59, '2.50', 'Available', '2023-01-18', '2023-12-12', 2),
(2301, 119, 234, '70.00', 'Available', '2023-01-18', '2023-02-11', 1);


---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS
---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS---TRIGGERS

CREATE TABLE medpharm_log
(
  transaction_op VARCHAR(20) NOT NULL,
  transaction_user TEXT NOT NULL,
  transaction_time TIMESTAMP NOT NULL,
  med_pharm_id integer,
  med_name integer,
  med_quan integer,
  med_price numeric(10,2) DEFAULT NULL,
  med_stat character varying(50)  DEFAULT NULL,
  med_added date,
  med_exp date,
  pharmacy integer
)

CREATE OR REPLACE FUNCTION process_medpharm_log() RETURNS TRIGGER AS $medpharm_log$
    BEGIN
        --
        -- Create rows in customer_log to reflect the operations performed on customer,
        -- making use of the special variable TG_OP to work out the operation.
        --
        IF (TG_OP = 'DELETE') THEN
            INSERT INTO medpharm_log
                SELECT 'Delete', user, now(), OLD.*;
				RETURN OLD;
        ELSIF (TG_OP = 'UPDATE') THEN
            INSERT INTO medpharm_log
                SELECT 'Update', user, now(), NEW.*;
				RETURN NEW;
        ELSIF (TG_OP = 'INSERT') THEN
            INSERT INTO medpharm_log
                SELECT 'Insert', user, now(), NEW.*;
				RETURN NEW;
        END IF;
        RETURN NULL; -- result is ignored since this is an AFTER trigger
    END;
$medpharm_log$ LANGUAGE plpgsql;


CREATE OR REPLACE TRIGGER medpharm_log
AFTER INSERT OR UPDATE OR DELETE ON med_pharm
FOR EACH ROW EXECUTE PROCEDURE process_medpharm_log();

------------------------------

