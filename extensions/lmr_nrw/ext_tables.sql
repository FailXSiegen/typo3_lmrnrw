#
# Table structure for table 'tt_content'
#
CREATE TABLE tt_content (
    opacity INT(4) DEFAULT '100' NOT NULL,

    bgimage_class VARCHAR(255) DEFAULT '' NOT NULL,
    bgimage_position VARCHAR(255) DEFAULT '' NOT NULL,

    parallax tinyint(4) DEFAULT '0' NOT NULL,
    parallaxoption VARCHAR(255) DEFAULT '' NOT NULL,
    animatecss VARCHAR(255) DEFAULT '' NOT NULL,

    space_start_class VARCHAR(255) DEFAULT '' NOT NULL,
    space_end_class VARCHAR(255) DEFAULT '' NOT NULL,

    counter_start VARCHAR(255) DEFAULT '' NOT NULL,
    counter_end VARCHAR(255) DEFAULT '' NOT NULL,
    counter_duration VARCHAR(255) DEFAULT '' NOT NULL,
    counter_delay VARCHAR(255) DEFAULT '' NOT NULL,
    counter_once tinyint(4) DEFAULT '0' NOT NULL,
    counter_decimals VARCHAR(255) DEFAULT '' NOT NULL,
    counter_decimalseparatorsymbol VARCHAR(255) DEFAULT '' NOT NULL,
    counter_currency VARCHAR(255) DEFAULT '' NOT NULL,
    counter_currencysymbol VARCHAR(255) DEFAULT '' NOT NULL,
    counter_currencyposition VARCHAR(255) DEFAULT '' NOT NULL,
    counter_separator tinyint(4) DEFAULT '0' NOT NULL,
    counter_separatorsymbol VARCHAR(255) DEFAULT '' NOT NULL,

    carousel_controls tinyint(4) DEFAULT '0' NOT NULL,
    carousel_indicators tinyint(4) DEFAULT '0' NOT NULL,
    carousel_captions tinyint(4) DEFAULT '0' NOT NULL,
    carousel_crossfade tinyint(4) DEFAULT '0' NOT NULL,
    carousel_intervall VARCHAR(255) DEFAULT '' NOT NULL,

);

#
# Table structure for table 'sys_file_reference'
#
CREATE TABLE sys_file_reference (
    image_style varchar(20) DEFAULT '' NOT NULL
);
