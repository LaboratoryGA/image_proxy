# Image Proxy
Simple templater component module which allows replacing an ``<img>`` tag with a ``<figure>`` tag.

## Motivation
Often, images of varing dimensions are uploaded, but need to be displayed in a constrained container. Simple using ``style="width: xxx; height: yyy"``` is insufficient to display these areas correctly (or will cause squishing or stretching of the images).

Using this templater component, you can instead generate a ``<figure>`` tag with the image set as the background image of the element. This allows much more useful options to be defined in the stylesheets, such as ``background-size: contain`` or ``background-size: cover``.

This can most often be used in sliders and fast-access buttons.

## Installation
Simply clone this repository into the directory structure of your Intranet site, and run ``phing``:
```shell
$ cd /Claromentis/web
$ git clone https://github.com/LaboratoryGA/image_proxy.git intranet/image_proxy
$ phing -Dapp=image_proxy install
```

## Usage
Any place where you see the following:
```html
<img name="img" visible="0" />
```
You replace it with the following:
```html
<component class="Claromentis\Image_proxy\Component" src="###" name="img" visible="0" />
```

You can optionally add in the following parameter(s):
* ``css_class``: defines the class attribute to add to the resulting ``<figure>`` element.
