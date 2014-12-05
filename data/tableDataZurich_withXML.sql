CREATE TABLE IF NOT EXISTS `attraction` (
    `_id`           INT         NOT NULL    AUTO_INCREMENT,
    `category`      VARCHAR(5)  NOT NULL,
    `name`          VARCHAR(20) NOT NULL,
    `location`      VARCHAR(20) NOT NULL,
    `price_range`   VARCHAR(5)  NOT NULL,
    `suitability`   VARCHAR(20) NOT NULL,
    `xml_desc`      MEDIUMBLOB  NOT NULL,
    `date_added`    TIMESTAMP   NOT NULL    DEFAULT NOW(),
    PRIMARY_KEY(`_id`)
) ENGINE = InnoDB;

INSERT INTO `attraction` (`_id`, `category`, `name`, `location`, `price_range`, `suitability`, `xml_desc`, `date_added`) (
VALUES (1, 'eat', 'Lindenhofkeller', 'Zurich', '$$$$', 'Relaxed',
'<?xml version="1.0" encoding="UTF-8"?>
<xml_desc>
    <caption>Wine Lovers Sanctuary</caption>
    <description>
        If you like to fine food and sumptious wine, then you are in right place
        in Lindenhofkeller. Since 1860, the restaurant Gastronomic delights high
        above the Limmat. Since 1996, it is the culinary skills of René K. 
        Hofer, that lures daily business people, tourists and wine lovers in 
        cozy Lindenhofkeller.
    </description>
    <images>
        <image>/assets/images/restaurant.jpg</image>
        <subimg>/assets/images/lindenhofkeller1.jpg</subimg>
        <subimg>/assets/images/lindenhofkeller2.jpg</subimg>
        <subimg>/assets/images/lindenhofkeller3.jpg</subimg>
    </images>
    <specifics>
        <cuisine_style>European</cuisine_style>
    </specifics>
</xml_desc>', '2014/09/25');

INSERT INTO `attraction` (`_id`, `category`, `name`, `location`, `price_range`, `suitability`, `xml_desc`, `date_added`) (
VALUES (2, 'sleep', 'Leoneck Hotel', 'Zurich City', '$$$', 'Family',
'<?xml version="1.0" encoding="UTF-8"?>
<xml_desc>
    <caption>The Centre of Zurich</caption>
    <description>
        The Leoneck Hotel is furnished in original Ethno style and located in a 
        prime location in the centre of Zurich City. In just six minutes, you can walk 
        to the main train station, the shopping area, the banking district, the 
        university, and the hospitals.
    </description>
    <images>
        <image>/assets/images/sleep.jpg</image>
        <subimg>/assets/images/leoneck1.jpg</subimg>
        <subimg>/assets/images/leoneck2.jpg</subimg>
        <subimg>/assets/images/leoneck3.jpg</subimg>
    </images>
    <specifics>
        <sleeps_how_many>500</sleeps_how_many>
    </specifics>
</xml_desc>', '2014/08/28');