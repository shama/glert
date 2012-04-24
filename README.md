# Glert Plugin

A Google Alerts plugin for CakePHP 2.x

## Background

@josegonzalez told me to built this. `Xml::build()` does nearly all the work
which is why this plugin is so simple. Please request features to justify this
being an entire plugin. :)

## Requirements

* PHP 5.2.8+
* CAKEPHP 2.0+
* Google

## Installation

### Manual

* Download this: http://github.com/shama/glert/zipball/master
* Unzip that download.
* Copy the resulting folder to app/Plugin/Glert/

### GIT Submodule

In your app directory type:

    git submodule add git://github.com/shama/glert.git Plugin/Glert
    git submodule init
    git submodule update

### GIT Clone

In your plugin directory type:

    git clone git://github.com/shama/glert.git Glert

## Usage

Specify a Google Alert feed URL and a regex pattern to filter the resulting URLs.

In this example we return all the github.com URLs with the username and repo
name parsed:

    <?php
    App::uses('Glert', 'Glert.Lib');
    $urls = Glert::find('http://google.com/alerts/feed/1234', '@github\.com\/(.*)\/(.*)@i');
    /*
    $urls equals array(
        array(
            'https://github.com/username/reponame',
            'github.com/username/reponame',
            'username',
            'reponame',
        ),
        array(
            'https://github.com/shama/another-project',
            'github.com/shama/another-project',
            'shama',
            'another-project',
        ),
    );
    */

If you want the direct SimpleXML then just do `Glert::build($url)`. `Glert` just
extends the core CakePHP `Xml` utility.

## License

Copyright (c) 2012 Kyle Robinson Young

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.