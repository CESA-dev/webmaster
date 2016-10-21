import os, sys
from PIL import Image

size = 512, 512

for infile in os.listdir("./board/"):
    outfile = infile + ".thumbnail"
    if infile != outfile:
        # try:
        im = Image.open("./board/" + infile)
        im.thumbnail(size, Image.ANTIALIAS)
        im.save(outfile, "JPEG")
        # except IOError:
        #     print "cannot create thumbnail for '%s'" % infile