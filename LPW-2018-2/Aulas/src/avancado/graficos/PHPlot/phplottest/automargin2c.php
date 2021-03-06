<?php
# $Id$
# Testing phplot - Automatic margin calculation - 2c
# This is a parameterized test. See the script named at the bottom for details.
$tp = array(
  'suffix' => ', top/right titles Only',   # Title part 2
  'do_title' => True,           # True to display the main title
  'x_title_pos' => 'plotup',  # X Title Position: plotdown plotup both none
  'y_title_pos' => 'plotright',  # Y Title Position: plotleft plotright both none
  'xticklabel' => 'none', # X Tick & label position: none|both|plotup|plotdown
  'xtick' => NULL,        # X Tick override, if different from xticklabel
  'yticklabel' => 'none', # Y Tick & label position: none|both|plotleft|plotright
  'ytick' => NULL,        # Y Tick override, if different from yticklabel
  'xticklen' => NULL,     # X Tick length (outside graph)
  'yticklen' => NULL,     # Y Tick length (outside graph)
  );
require 'automargin.php';
