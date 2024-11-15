(function() {
const subclassNames = {
  0: 'Разное',
  1: 'Ткань',
  2: 'Кожа',
  3: 'Кольчуга',
  4: 'Латы',
  5: 'Малый щит (УСТАРЕВШЕЕ)',
  6: 'Щит',
  7: 'Манускрипт',
  8: 'Идол',
  9: 'Тотем',
  10: 'Печать'
};

const weapSubClassNames = {
  0 : 'Топор',
  1 : 'Топор',
  2 : 'Лук',
  3 : 'Огнестрельное',
  4 : 'Дробящее',  
  5 : 'Дробящее',
  6 : 'Копье',
  7 : 'Меч',  
  8 : 'Меч',
  9 : 'Устаревший',
  10 : 'Посох',
  11 : 'Экзотическое',  
  12 : 'Экзотическое', 
  13 : 'Кистевое',
  14 : 'Разное',
  15 : 'Кинжал',
  16 : 'Метательное',
  17 : 'Копье',
  18 : 'Арбалет', 
  19 : 'Жезл',
  20 : 'Удочка'  
}

const classNames = {
  1: 'Воин',
  2: 'Паладин',
  4: 'Охотник',
  8: 'Разбойник',
  16: 'Жрец',
  32: 'Рыцарь смерти',
  64: 'Шаман',
  128: 'Маг',
  256: 'Чернокнижник',
  1024: 'Друид'
};

const statNames = {
  0: 'к мане',
  1: 'к здоровью',
  3: 'к ловкости',
  4: 'к силе',
  5: 'к интелекту',
  6: 'к духу',
  7: 'к выносливости',
  12: 'Если на персонаже: Увеличивает рейтинг защиты на на',
  13: 'Если на персонаже: Увеличивает рейтинг уклонения на',
  14: 'Если на персонаже: Увеличивает рейтинг парирования на',
  15: 'Если на персонаже: Увеличивает рейтинг блока на',
  16: 'Если на персонаже: Увеличивает рейтинг меткости ближнего боя на',
  17: 'Если на персонаже: Увеличивает рейтинг меткости дальнего боя на',
  18: 'Если на персонаже: Увеличивает рейтинг меткости заклинаний на',
  19: 'Если на персонаже: Увеличивает рейтинг критического удара ближнего боя на',
  20: 'Если на персонаже: Увеличивает рейтинг критического удара дальнего боя на',
  21: 'Если на персонаже: Увеличивает рейтинг критического удара заклинаний на',
  22: 'Если на персонаже: Увеличивает рейтинг полученного урона ближнего боя на',
  23: 'Если на персонаже: Увеличивает рейтинг полученного урона дальнего боя на',
  24: 'Если на персонаже: Увеличивает рейтинг полученного урона заклинаний на',
  25: 'Если на персонаже: Уменьшает рейтинг критического удара полученного ближнего боя на',
  26: 'Если на персонаже: Уменьшает рейтинг критического удара полученного дальнего боя на',
  27: 'Если на персонаже: Увеличивает рейтинг критического удара полученного заклинаний на',
  28: 'Если на персонаже: Увеличивает рейтинг скорости ближнего боя на',
  29: 'Если на персонаже: Увеличивает рейтинг скорости дальнего боя на',
  30: 'Если на персонаже: Увеличивает рейтинг скорости заклинаний на',
  31: 'Если на персонаже: Увеличивает рейтинг меткости на',
  32: 'Если на персонаже: Увеличивает рейтинг критического удара на',
  33: 'Если на персонаже: Увеличивает рейтинг полученной меткости на',
  34: 'Если на персонаже: Увеличивает рейтинг полученного критического удара на',
  35: 'Если на персонаже: Увеличивает рейтинг устойчивости на',
  36: 'Если на персонаже: Увеличивает рейтинг скорости на',
  37: 'Если на персонаже: Увеличивает рейтинг экспертности на',
  38: 'Если на персонаже: Увеличивает силу атаки на',
  39: 'Если на персонаже: Увеличивает силу дистанционной атаки на',
  40: 'Если на персонаже: Увеличивает силу звериной атаки на',
  41: 'Если на персонаже: Увеличивает исцеление заклинания на',
  42: 'Если на персонаже: Увеличивает урон заклинания на',
  43: 'Если на персонаже: Увеличивает восстановление маны на',
  44: 'Если на персонаже: Увеличивает рейтинг пробивания брони на',
  45: 'Если на персонаже: Увеличивает силу заклинаний на',
  46: 'Если на персонаже: Увеличивает реген здоровья на',
  47: 'Если на персонаже: Увеличивает пробитие заклинаний на',
  48: 'Если на персонаже: Увеличивает значение блока на'
};

const inventoryTypeNames = {
  0: 'Нельзя надеть',
  1: 'Голова',
  2: 'Шея',
  3: 'Плечи',
  4: 'Тело',
  5: 'Грудь',
  6: 'Талия',
  7: 'Ноги',
  8: 'Ступни',
  9: 'Запястья',
  10: 'Кисти рук',
  11: 'Палец',
  12: 'Аксессуар',
  13: 'Оружие',
  14: 'Левая рука',
  15: 'Дальнобойное',
  16: 'Плащ',
  17: 'Двуручное оружие',
  18: 'Сумка',
  19: 'Гербовая накидка',
  20: 'Роба',
  21: 'Правая рука',
  22: 'Левая рука',
  23: 'Держимое',
  24: 'Боеприпасы',
  25: 'Метательное',
  26: 'Дальнобойное (правой рукой)',
  27: 'Колчан',
  28: 'Реликвия'
};

const qualityColors = {
  0: '#808080', // Серый (Плохой)
  1: '#FFFFFF', // Белый (Обычный)
  2: '#1EFF00', // Зеленый (Необычный)
  3: '#0070DD', // Синий (Редкий)
  4: '#A335EE', // Фиолетовый (Эпический)
  5: '#FF8000', // Оранжевый (Легендарный)
  6: '#FF0000', // Красный (Артефакт)
  7: '#FFD700'  // Золотой (Привязанный к аккаунту)
};

const bondingNames = {
  0: 'Без привязки',
  1: 'Становится персональным при поднятии',
  2: 'Привязывается при одевании',
  3: 'Привязывается при использовании',
  4: 'Предмет квеста',
  5: 'Предмет квеста 1'
};

const classColors = {
  1: '#c69b6d',
  2: '#f48cba',
  4: '#aad372',
  8: '#fff468',
  16: '#fff',
  32: '#c41e3a',
  64: '#0070dd',
  128: '#3fc7eb',
  256: '#8788ee',
  1024: '#ff7c0a'
};

function getAllowableClasses(allowableClass) {
  let classes = [];
  for (let bit in classNames) {
      if (allowableClass & bit) {
          classes.push('<span style="color:' + classColors[bit] + ';">' + classNames[bit] + '</span>');
      }
  }
  return classes.length > 0 ? classes.join(', ') : 'Нет доступных классов';
}

function showTooltip(item,event) {
  var itemColor = qualityColors[item.Quality] || '#FFFFFF';

  var tooltipContent = '<strong style="color:' + itemColor + ';">' + item.name + '</strong><br>' +
      ' ' + bondingNames[item.bonding] + '<br>' +
      '<div style="display: flex; justify-content: space-between;">' +
      '<span>' + inventoryTypeNames[item.InventoryType] + '</span>';

  
      if(item.class == 2)
      {
        tooltipContent += '<span>' + weapSubClassNames[item.subclass] + '</span>';
      }
      else
      {
        tooltipContent += '<span>'+ subclassNames[item.subclass] + '</span>';
      }

      tooltipContent += '</div>';

  if (item.class === 2) {
      tooltipContent += '<div style="display: flex; justify-content: space-between;">'+
      'Урон: ' + item.dmg_min1 + ' - ' + item.dmg_max1 + '<br>';
      if(item.class === 2)
        {
          tooltipContent += '<span>Скорость ' + ((item.delay / 1000).toFixed(2)) + '</span>'
        }
        tooltipContent += '</div>';

      tooltipContent += '('+parseFloat(((item.dmg_min1 + item.dmg_max1) / (item.delay / 1000)).toFixed(1))+' Единиц урона в секунду) <br>';
  } else {
      tooltipContent += 'Броня: ' + item.armor + '<br>';
  }

  const allowedStatTypes = [0, 1, 3, 4, 5, 6, 7];

  for (let i = 1; i <= 10; i++) {
      if (item[`stat_type${i}`] !== undefined) {
          let statType = item[`stat_type${i}`];
          let statValue = item[`stat_value${i}`];
          if (allowedStatTypes.includes(statType) && statValue > 0) {
              tooltipContent += '+' + statValue + ' ' + statNames[statType] + '<br>';
          }
      }
  }

  if (item.socketColors.length > 0) {
      tooltipContent += '<div style="margin-top: 5px;">';
      item.socketColors.forEach(function(color) {
          if (color > 0) {
              let socketImage;
              let socketText = '';
              switch (color) {
                  case 1:
                      socketImage = 'https://i.postimg.cc/HcyHNSsy/socket-meta.gif';
                      socketText = 'Особое гнездо';
                      break;
                  case 2:
                      socketImage = 'https://i.postimg.cc/5QW1Ww6k/socket-red.gif';
                      socketText = 'Красное гнездо';
                      break;
                  case 4:
                      socketImage = 'https://i.postimg.cc/YLN7rhF2/socket-yellow.gif';
                      socketText = 'Желтое гнездо';
                      break;
                  case 8:
                      socketImage = 'https://i.postimg.cc/jW9tZVKT/socket-blue.gif';
                      socketText = 'Синее гнездо';
                      break;
                  default:
                      socketImage = '';
              }
              if (socketImage) {
                  tooltipContent += '<div style="display: flex; align-items: center; margin-bottom: 2px;">' +
                      '<img src="' + socketImage + '" alt="Сокет" class="socket" />' +
                      '<span style="color: #808080; margin-left: 5px;">' + socketText + '</span>' +
                      '</div>';
              }
          }
      });
      tooltipContent += '</div>';
      tooltipContent += '<div style="margin-top: 5px;">';
      tooltipContent += '</div>';
  }

  if(item.MaxDurability > 0)
  {
  tooltipContent += 'Прочность: ' + item.MaxDurability + ' / ' + item.MaxDurability + '<br>' +
      'Класс: ' + getAllowableClasses(item.AllowableClass) + '<br>';
  }

  tooltipContent += 'Требуемый уровень: ' + item.RequiredLevel + '<br>';
  tooltipContent += '<span style="color: #FFD700;">Уровень предмета: ' + item.ItemLevel + '</span><br>';

  const allowedStatTypes1 = [12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26,
      27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48];

  for (let i = 1; i <= 10; i++) {
      if (item[`stat_type${i}`] !== undefined) {
          let statType = item[`stat_type${i}`];
          let statValue = item[`stat_value${i}`];
          if (allowedStatTypes1.includes(statType) && statValue > 0) {
              tooltipContent += `<span style="color: lime;">${statNames[statType]} +${statValue}</span><br>`;
          }
      }
  }

  if(item.description)
  {
    tooltipContent += '<font color="gold">\"'+item.description+'\"</font><br>';
  }

        const tooltip = document.getElementById('tooltip');
        tooltip.innerHTML = tooltipContent;
        tooltip.style.top = (event.pageY + 10) + 'px';
        tooltip.style.left = (event.pageX + 10) + 'px';
        tooltip.style.display = 'block';
    }

    function hideTooltip() {
        const tooltip = document.getElementById('tooltip');
        tooltip.style.display = 'none';
    }

    function initTooltips() {
        const items = document.querySelectorAll('[data-entry]');

        items.forEach(item => {
            item.addEventListener('mouseenter', function(event) {
                const entry = this.getAttribute('data-entry');
                fetch('https://wow.net.kg/tooltip/get_item_info.php?entry=' + entry)
                    .then(response => response.json())
                    .then(data => showTooltip(data, event));
            });
            item.addEventListener('mouseleave', hideTooltip);
        });

        const tooltip = document.createElement('div');
        tooltip.id = 'tooltip';
        tooltip.style.position = 'absolute';
        tooltip.style.backgroundColor = 'rgba(0, 0, 0, 0.9)';
        tooltip.style.color = '#ffffff';
        tooltip.style.borderRadius = '5px';
        tooltip.style.padding = '10px';
        tooltip.style.zIndex = '1000';
        tooltip.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.5)';
        tooltip.style.maxWidth = '300px';
        tooltip.style.fontSize = '14px';
        tooltip.style.lineHeight = '1.5';
        tooltip.style.border = '1px solid #FFD700';
        tooltip.style.display = 'none';

        document.body.appendChild(tooltip);
    }

    document.addEventListener('DOMContentLoaded', initTooltips);
})();