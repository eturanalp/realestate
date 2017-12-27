<? include "html.php"; ?>
<?
$tip = $_GET[tip];

$kanun = $_GET[kanun];

if ($tip == "bilgi") { include "include/mevzuat/bilgi.htm"; }

if ($tip == "terimler") { include "include/mevzuat/terimler.htm"; }

if ($kanun == "dvk") { include "include/mevzuat/deprem_vergisi_kanunu.htm"; }

if ($kanun == "evk") { include "include/mevzuat/emlak_vergisi_kanunu.htm"; }

if ($kanun == "gkhk") { include "include/mevzuat/gayrimenkul_kiralari_hakkinda_kanun.htm"; }

if ($kanun == "ik") { include "include/mevzuat/imar_kanunu.htm"; }

if ($kanun == "kmk") { include "include/mevzuat/kat_mulkiyeti_kanunu.htm"; }

if ($kanun == "kk") { include "include/mevzuat/kiyi_kanunu.htm"; }

if ($kanun == "tk") { include "include/mevzuat/tapu_kanunu.htm"; }
?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<? include "taban.php"; ?>
</body>

</html>
