INSERT INTO category(category_name)
SELECT DISTINCT category_name from importdata;

INSERT INTO flavor(category_id, flavor_name)
SELECT DISTINCT category.category_id, importdata.flavor_name
FROM importdata INNER JOIN category 
    ON importdata.category_name = category.category_name;
