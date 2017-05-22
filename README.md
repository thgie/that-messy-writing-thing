# that messy writing thing
this is a little webthing written in php and laravel (total overkill) to write text like notes or something. if you will use it you will lose oversight on what's where - promised. there is a running instance here: http://messy.thgie.ch

## how to use for writing
there is a tiny manual here: http://messy.thgie.ch/p/43 but in case somebody deletes that:

__Key 'E'__ or the first Button enable Edit mode. You can write and style your text. After entering Edit mode, just click into the text and start writing. By highlighting text you are able to style it. You can leave Edit mode with __key 'Esc'__ or clicking the Pen button again.

> Your piece is automatically saved when you leave edit mode.

When you're not in edit mode you can highlight your text. Just select the text you want to highlight and press __key 'H'__ or click the second button. Highlighting is important because they will link to new pieces or existing ones.

Once you're done highlighting edit press __key 'Q'__ or click the third button to link your highlights to a new piece or __key 'C'__ or the fourth button to link to an existing piece.

If you accidentally made highlights you don't need, just click them and push __key 'R'__.

The last button just creates a completely new piece without any links.

Keys:

- E: Edit
- H: Highlight
- Q: Quote
- C: Chain
- R: Remove
- Esc: Leave Edit Mode

## installation

I guess something like

1. git clone git@github.com:thgie/that-messy-writing-thing.git
2. cd that-messy-writing-thing
3. composer install