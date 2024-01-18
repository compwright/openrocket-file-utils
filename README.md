# openrocket-file-utils

Command line tool to generate reports from OpenRocket (.ork) files

## System Requirements

* PHP 8.2 or higher
* [Composer](https://getcomposer.org)

## Installation

To install, make sure you have the system requirements installed, and then run:

> $ composer global require compwright/openrocket-file-utils

> Note: this will install into `~/.composer/vendor/bin/`, make sure this directory is in your path:
> 
>     $ export PATH=~/.composer/vendor/bin:$PATH

To upgrade, run:

> $ composer global update

## Usage

```
orktools

Usage:
  command [options] [arguments]

Options:
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

Available commands:
  bom         Create a bill of materials (BOM)
  completion  Dump the shell completion script
  fin-stats   Get production stats about the fins
  help        Display help for a command
  list        List commands
```

## Commands

### orktools bom

```
Description:
  Create a bill of materials (BOM)

Usage:
  bom [options] [--] <file>

Arguments:
  file                  OpenRocket (.ork) file path

Options:
  -f, --format=FORMAT   Output format [default: "ascii"]
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

#### Example

```
$ orktools bom resources/CenturiArrow300.ork
+----------+-----------------+---------------------------+---------------------+---------+
| quantity | type            | name                      | manufacturer        | part    |
+----------+-----------------+---------------------------+---------------------+---------+
| 1        | nosecone        | Nose Cone, PNC-89         | SEMROC              | BC-846G |
| 1        | bodytube        | Body Tube, ST-8800        | SEMROC              | ST-8800 |
| 1        | bulkhead        | Coupler, BTC-8            | SEMROC Astronautics | BTC-8   |
| 1        | bodytube        | Body Tube, ST-8157        | SEMROC              | ST-8157 |
| 1        | shockcord       | Shock Cord                |                     |         |
| 1        | bodytube        | 18mm MMT, ST-730          | SEMROC              | ST-730  |
| 1        | centeringring   | Centering Ring, CR-78     |                     |         |
| 1        | engineblock     | Engine Block, TR-7        | SEMROC Astronautics | TR-7    |
| 1        | trapezoidfinset | Yellow fin                |                     |         |
| 1        | trapezoidfinset | Yellow fin                |                     |         |
| 1        | trapezoidfinset | Black fin                 |                     |         |
| 1        | trapezoidfinset | Black fin                 |                     |         |
| 1        | bodytube        | Gap                       |                     |         |
| 1        | bodytube        | 18mm MMT, ST-730          | SEMROC              | ST-730  |
| 1        | tubecoupler     | Tube Coupler, HTC-7BP     | SEMROC              | HTC-7B  |
| 1        | engineblock     | Engine Block, TR-7 (half) |                     |         |
| 1        | trapezoidfinset | Black fin                 |                     |         |
| 1        | trapezoidfinset | Black fin                 |                     |         |
| 1        | trapezoidfinset | Black fin                 |                     |         |
| 1        | trapezoidfinset | Black fin                 |                     |         |
| 1        | bodytube        | 18mm MMT, ST-730          | SEMROC              | ST-730  |
| 1        | tubecoupler     | Tube Coupler, HTC-7BP     | SEMROC              | HTC-7B  |
| 1        | engineblock     | Engine Block, TR-7 (half) |                     |         |
| 1        | trapezoidfinset | Yellow fin                |                     |         |
| 1        | trapezoidfinset | Yellow fin                |                     |         |
| 1        | trapezoidfinset | Yellow fin                |                     |         |
| 1        | trapezoidfinset | Yellow fin                |                     |         |
+----------+-----------------+--------- total: 27 -------+---------------------+---------+
```

### orktools fin-stats

```
Description:
  Get production stats about the fins

Usage:
  fin-stats [options] [--] <file>

Arguments:
  file                  OpenRocket (.ork) file path

Options:
  -f, --format=FORMAT   Output format [default: "ascii"]
  -h, --help            Display help for the given command. When no command is given display help for the list command
  -q, --quiet           Do not output any message
  -V, --version         Display this application version
      --ansi|--no-ansi  Force (or disable --no-ansi) ANSI output
  -n, --no-interaction  Do not ask any interactive question
  -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug
```

#### Example

> Note: units shown are in meters.

```
$ orktools fin-stats resources/CenturiArrow300.ork
+------------+------------------+
| name       | perimeter        |
+------------+------------------+
| Yellow fin | 0.17311799578536 |
| Yellow fin | 0.17311799578536 |
| Black fin  | 0.17311799578536 |
| Black fin  | 0.17311799578536 |
| Black fin  | 0.17311799578536 |
| Black fin  | 0.17311799578536 |
| Black fin  | 0.17311799578536 |
| Black fin  | 0.17311799578536 |
| Yellow fin | 0.17311799578536 |
| Yellow fin | 0.17311799578536 |
| Yellow fin | 0.17311799578536 |
| Yellow fin | 0.17311799578536 |
+--- total: 2.0774159494244 ----+
```

## Output formats

The following output formats are supported:

* `ascii` (default)
* `csv`
* `html`
* `json`

## License

Licensed under the MIT open source license.
