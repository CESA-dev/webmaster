import os, sys
from PIL import Image

size = 512, 512

# for infile in os.listdir("./board/"):
#     outfile = infile + ".thumbnail"
#     if infile != outfile:
#         # try:
#         im = Image.open("./board/" + infile)
#         im.thumbnail(size, Image.ANTIALIAS)
#         im.save(outfile, "JPEG")
        # except IOError:
        #     print "cannot create thumbnail for '%s'" % infile
        #     

for infile in os.listdir("./board_thumbnail/"):
    outfile = infile + ".cropped"
    if infile != outfile:
        im = Image.open("./board_thumbnail/" + infile)
        width = im.size[0]
        height = im.size[1]
        img = im.crop((0, 0, width, width))
        img.save(outfile, "JPEG")
